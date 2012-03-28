<?php
class UpdateSearchIndexFileModule extends FileModule {
	private $aIndexPaths;
	private $sLanguageId;
	private $oRootNavigationItem;
	
	public function __construct($aRequestPath) {
		parent::__construct($aRequestPath);
		$this->sLanguageId = Manager::usePath();
		if($this->sLanguageId === null) {
			throw new Exception('No language given');
		}
		if(!isset($_REQUEST['secret']) || $_REQUEST['secret'] !== Settings::getSetting('full_text_search', 'update_secret', null)) {
			throw new Exception('Not Authorized');
		}
		$this->aIndexPaths = array();
	}
	
	public function renderFile() {
		//Prerequisites
		Session::getSession()->setLanguage($this->sLanguageId);
		
		//Clear index
		SearchIndexQuery::create()->filterByLanguageId($this->sLanguageId)->delete();
		
		//Spider index
		$oRootPage = PagePeer::getRootPage();
		$this->oRootNavigationItem = PageNavigationItem::navigationItemForPage($oRootPage);
		$this->spider($this->oRootNavigationItem);
		
		//GC
		gc_enable();
		
		//Update index
		PreviewManager::setTemporaryManager('FrontendManager');
		foreach($this->aIndexPaths as $aPath) {
			$this->index($aPath);
			set_time_limit(30);
			$this->gc();
			print "Indexed <code>/".htmlentities(implode('/', $aPath))."</code><br>\n";
		}
		PreviewManager::revertTemporaryManager();
	}
	
	private function gc() {
		LanguageObjectPeer::clearInstancePool();
		DocumentPeer::clearInstancePool();
		SearchIndexPeer::clearInstancePool();
		SearchIndexWordPeer::clearInstancePool();	
		gc_collect_cycles();
	}
	
	private function spider($oNavigationItem) {
		FilterModule::getFilters()->handleNavigationPathFound($this->oRootNavigationItem, $oNavigationItem);
		if($oNavigationItem->isIndexed() && !$oNavigationItem->isFolder()) {
			$this->aIndexPaths[] = $oNavigationItem->getLink();
		}
		foreach($oNavigationItem->getChildren($this->sLanguageId, true, true) as $oSubNavigationItem) {
			$this->spider($oSubNavigationItem);
		}
	}

	private function index(array $aPath) {
		$oNavigationItem = $this->oRootNavigationItem;
		PageNavigationItem::clearCache();
		
		while(count($aPath) > 0) {
			$oNavigationItem = $oNavigationItem->namedChild(array_shift($aPath), $this->sLanguageId, true, true);
		}
		FilterModule::getFilters()->handleNavigationPathFound($this->oRootNavigationItem, $oNavigationItem);
		FrontendManager::$CURRENT_NAVIGATION_ITEM = $oNavigationItem;
		$oPageNavigationItem = $oNavigationItem;
		while(!($oPageNavigationItem instanceof PageNavigationItem)) {
			$oPageNavigationItem = $oPageNavigationItem->getParent();
		}
		FrontendManager::$CURRENT_PAGE = $oPageNavigationItem->getMe();
		$oPage = FrontendManager::$CURRENT_PAGE;
		$bIsNotFound = false;
		FilterModule::getFilters()->handlePageHasBeenSet($oPage, $bIsNotFound, $oNavigationItem);
		FilterModule::getFilters()->handleRequestStarted();
		FilterModule::getFilters()->handlePageNotFoundDetectionComplete($bIsNotFound, $oPage, $oNavigationItem, array(&$bIsNotFound));
		if($bIsNotFound) {
			return;
		}
		
		$sDescription = $oNavigationItem->getDescription($this->sLanguageId);
		if($sDescription === null) {
			$sDescription = $oPage->getDescription($this->sLanguageId);
		}
		$aKeywords = array();
		foreach($oPage->getConsolidatedKeywords($this->sLanguageId, true) as $sKeyword) {
			$aKeywords = array_merge($aKeywords, StringUtil::getWords($sKeyword));
		}
		$sTitle = $oNavigationItem->getTitle($this->sLanguageId);
		$sLinkText = $oNavigationItem->getLinkText($this->sLanguageId);
		if(!$sLinkText) {
			$sLinkText = $sTitle;
		}
		$sName = $oNavigationItem->getName();
		
		$oPageType = PageTypeModule::getModuleInstance($oPage->getPageType(), $oPage, $oNavigationItem);
		$aWords = $oPageType->getWords();
		$aWords = array_merge($aWords, StringUtil::getWords($sDescription), $aKeywords, StringUtil::getWords($sTitle), StringUtil::getWords($sLinkText), array($sName));
		
		$aPagePath = $oPage->getLink();
		$aNavigationItemPath = $oNavigationItem->getLink();
		$sPath = implode('/', array_diff($aNavigationItemPath, $aPagePath));
		
		$oSearchIndex = new SearchIndex();
		$oSearchIndex->setPageId($oPage->getId());
		$oSearchIndex->setPath($sPath);
		$oSearchIndex->setLinkText($sLinkText);
		$oSearchIndex->setPageTitle($sTitle);
		$oSearchIndex->setLanguageId($this->sLanguageId);
		$oSearchIndex->save();
		
		foreach($aWords as $sWord) {
			$sWord = Synonyms::rootFor($sWord, $this->sLanguageId);
			$oSearchIndexWord = SearchIndexWordQuery::create()->filterBySearchIndex($oSearchIndex)->filterByWord($sWord)->findOne();
			if($oSearchIndexWord === null) {
				$oSearchIndexWord = new SearchIndexWord();
				$oSearchIndexWord->setSearchIndex($oSearchIndex);
				$oSearchIndexWord->setWord($sWord);
			} else {
				$oSearchIndexWord->incrementCount();
			}
			$oSearchIndexWord->save();
		}
	}
}
