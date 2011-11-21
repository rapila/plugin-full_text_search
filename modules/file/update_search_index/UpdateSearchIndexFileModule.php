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
		//Clear index
		SearchIndexQuery::create()->filterByLanguageId()->deleteAll();
		//Spider index
		$oRootPage = PagePeer::getRootPage();
		$this->oRootNavigationItem = PageNavigationItem::navigationItemForPage($oRootPage);
		$this->spider($this->oRootNavigationItem);
		
		Util::dumpAll($this->aIndexPaths);
		
	}
	
	private function spider($oNavigationItem) {
		FilterModule::getFilters()->handleNavigationPathFound($this->oRootNavigationItem, $oNavigationItem);
		$this->aIndexPaths[] = $oNavigationItem->getLink();
		foreach($oNavigationItem->getChildren($this->sLanguageId, true, true) as $oSubNavigationItem) {
			$this->spider($oSubNavigationItem);
		}
	}

	private function indexForPage(Page $oPage) {
		FrontendManager::$CURRENT_PAGE = $oPage;
	}
}
