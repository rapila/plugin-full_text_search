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
		$sLanguageId = Session::language();

		$oListTemplate = null;
		$oItemTemplatePrototype = null;
		try {
			$oListTemplate = new Template("search_results/$sTemplateName");
			$oItemTemplatePrototype = new Template("search_results/${sTemplateName}_item");
		} catch (Exception $e) {
			$oListTemplate = new Template("search_results/default");
			$oItemTemplatePrototype = new Template("search_results/default_item");
		}

		$aResults = array();
		
		$sWords = isset($_REQUEST['q']) ? $_REQUEST['q'] : '';
		if($sWords) {
			$aWords = StringUtil::getWords($sWords, false, '%');
			$oSearchWordQuery = SearchIndexWordQuery::create();
			foreach($aWords as $sWord) {
				$sWord = Synonyms::rootFor($sWord);
				$sComparison = Criteria::EQUAL;
				if (strpos($sWord, '%') !== false) {
						$sComparison = Criteria::LIKE;
				}
				$oSearchWordQuery->addOr(SearchIndexWordPeer::WORD, $sWord, $sComparison);
			}
			$oSearchWordQuery->joinSearchIndex()->useQuery('SearchIndex')->joinPage()->useQuery('Page')->active(true)->filterByIsProtected(false)->endUse()->endUse();
		
			foreach($oSearchWordQuery->find() as $oSearchIndexWord) {
				$iId = $oSearchIndexWord->getSearchIndexId();
				if(isset($aResults[$iId])) {
					$aResults[$iId] += $oSearchIndexWord->getCount();
				} else {
					$aResults[$iId] = $oSearchIndexWord->getCount();
				}
			}
			arsort($aResults);
		}
		$oListTemplate->replaceIdentifier('count', count($aResults));
		$oListTemplate->replaceIdentifier('search_string', $sWords);
		
		if(count($aResults) === 0) {
			$oListTemplate->replaceIdentifier('no_results', StringPeer::getString('wns.search.no_results', null, null, array('search_string' => $sWords)));
		}

		foreach($aResults as $iIndexId => $iCount) {
			$oIndex = SearchIndexQuery::create()->findPk(array($iIndexId, $sLanguageId));
			if(!$oIndex || !$oIndex->getPage()) {
				continue;
			}
			$oItemTemplate = clone $oItemTemplatePrototype;
			$oIndex->renderListItem($oItemTemplate);
			$oItemTemplate->replaceIdentifier('count', $iCount);
			$oListTemplate->replaceIdentifierMultiple('items', $oItemTemplate);
		}
		
		$oTemplate->replaceIdentifier('search_results', $oListTemplate);
	}
			 
	public function setIsDynamicAndAllowedParameterPointers(&$bIsDynamic, &$aAllowedParams, $aModulesToCheck = null) {
		$bIsDynamic = true;
		$aAllowedParams = array('search');
	}
	
}
