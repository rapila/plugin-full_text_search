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
		
		$oSearchTemplate = new Template("search/{$sTemplateName}_list");
		$sResultTemplateName = "search/{$sTemplateName}_result";
		
		$oTemplate->replaceIdentifier('search_results', $oSearchTemplate);
	}
			 
	public function setIsDynamicAndAllowedParameterPointers(&$bIsDynamic, &$aAllowedParams, $aModulesToCheck = null) {
		$bIsDynamic = true;
		$aAllowedParams = array('search');
	}
	
}
