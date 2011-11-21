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
		SearchIndexQuery::create()->filterByLanguageId()->deleteAll();
		
		//Spider index
		$oRootPage = PagePeer::getRootPage();
		$this->oRootNavigationItem = PageNavigationItem::navigationItemForPage($oRootPage);
		$this->spider($this->oRootNavigationItem);
		
		//Update index
		PreviewManager::setTemporaryManager('FrontendManager');
		foreach($this->aIndexPaths as $aPath) {
			$this->index($aPath);
		}
	}
	
	private function spider($oNavigationItem) {
		FilterModule::getFilters()->handleNavigationPathFound($this->oRootNavigationItem, $oNavigationItem);
		$this->aIndexPaths[] = $oNavigationItem->getLink();
		foreach($oNavigationItem->getChildren($this->sLanguageId, true, true) as $oSubNavigationItem) {
			$this->spider($oSubNavigationItem);
		}
	}

	private function index(array $aPath) {
		$oNavigationItem = $this->oRootNavigationItem;
		PageNavigationItem::clearCache();
		
		while(count($aPath) > 0) {
			$oNavigationItem = $oNavigationItem->namedChild(array_pop($aPath), $this->sLanguageId, true, true);
		}
		FilterModule::getFilters()->handleNavigationPathFound($this->oRootNavigationItem, $oNavigationItem);
		FrontendManager::$CURRENT_NAVIGATION_ITEM = $oNavigationItem;
		$oPageNavigationItem = $oNavigationItem;
		while(!($oPageNavigationItem instanceof PageNavigationItem)) {
			$oPageNavigationItem = $oPageNavigationItem->getParent();
		}
		FrontendManager::$CURRENT_PAGE = $oPageNavigationItem->getMe();
		$bIsNotFound = false;
		FilterModule::getFilters()->handlePageHasBeenSet(FrontendManager::$CURRENT_PAGE, $bIsNotFound, FrontendManager::$CURRENT_NAVIGATION_ITEM);
		FilterModule::getFilters()->handleRequestStarted();
		FilterModule::getFilters()->handlePageNotFoundDetectionComplete($bIsNotFound, FrontendManager::$CURRENT_PAGE, FrontendManager::$CURRENT_NAVIGATION_ITEM, array(&$bIsNotFound));
		if($bIsNotFound) {
			return;
		}
	}
}
