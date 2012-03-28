<?php
class SearchFilterModule extends FilterModule {
	public function onFillPageAttributes($oCurrentPage, $oTemplate) {
		$oSearchPage = $oCurrentPage->getPageOfType('search_result');
		if($oSearchPage === null) {
			return;
		}
		$oTemplate->replaceIdentifier("search_action", LinkUtil::link($oSearchPage->getLinkArray()));
		foreach($oTemplate->identifiersMatching('search_form', Template::$ANY_VALUE) as $oIdentifier) {
			$oSubTemplate = new Template($oIdentifier->getValue() ? $oIdentifier->getValue() : 'default', array(DIRNAME_TEMPLATES, 'search_form'));
			$oSubTemplate->replaceIdentifier("search_action", LinkUtil::link($oSearchPage->getLinkArray()));
			$oTemplate->replaceIdentifier($oIdentifier, $oSubTemplate);
		}
	}
}
