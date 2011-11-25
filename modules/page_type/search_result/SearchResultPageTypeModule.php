<?php
/**
	* @package modules.page_type
	*/
class SearchResultPageTypeModule extends PageTypeModule {
			
	public function __construct(Page $oPage = null, NavigationItem $oNavigationItem = null) {
		parent::__construct($oPage, $oNavigationItem);
	}
	
	public function display(Template $oTemplate, $bIsPreview = false) {
		$sTemplateName = $this->oPage->getTemplateNameUsed();

		$oListTemplate = null;
		$oItemTemplatePrototype = null;
		try {
			$oListTemplate = new Template("search_results/$sTemplateName");
			$oItemTemplatePrototype = new Template("search_results/${sTemplateName}_item");
		} catch (Exception $e) {
			$oListTemplate = new Template("search_results/default");
			$oItemTemplatePrototype = new Template("search_results/default_item");
		}

		$sWords = isset($_REQUEST['q']) ? $_REQUEST['q'] : '';
		$aWords = StringUtil::getWords($sWords);
		$oSearchWordQuery = SearchIndexWordQuery::create();
		foreach($aWords as $sWord) {
			$oSearchWordQuery->addOr(SearchIndexWordPeer::WORD, $sWord);
		}
		$oSearchWordQuery->joinSearchIndex()->useQuery('SearchIndex')->joinPage()->useQuery('Page')->active(true)->filterByIsProtected(false)->endUse()->endUse();
	
		Util::dumpAll($oSearchWordQuery->find()->toArray());
		
		$oTemplate->replaceIdentifier('search_results', $oListTemplate);
	}
			 
	public function setIsDynamicAndAllowedParameterPointers(&$bIsDynamic, &$aAllowedParams, $aModulesToCheck = null) {
		$bIsDynamic = true;
		$aAllowedParams = array('search');
	}
	
}
