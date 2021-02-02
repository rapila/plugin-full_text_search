<?php

/**
 * @package    propel.generator.model
 */
class SearchIndex extends BaseSearchIndex {
	public function getLink($sLanguageId = null) {
		return LinkUtil::link($this->getLinkArray(), 'FrontendManager', array(), $sLanguageId);
	}

	public function getLinkArray() {
		return $this->getPage()->getFullPathArray($this->getPathArray());
	}

	public function getPathArray() {
		return explode('/', $this->getPath());
	}

	public function renderListItem(Template $oTemplate) {
		$oTemplate->replaceIdentifier("id", $this->getId());
		$oTemplate->replaceIdentifier("name", $this->getPage()->getName());
		$oTemplate->replaceIdentifier("link_text", $this->getLinkText());
		$oTemplate->replaceIdentifier("title", $this->getPageTitle());
		$oTemplate->replaceIdentifier("description", $this->getPage()->getDescription());
		$oTemplate->replaceIdentifier("url", $this->getLink($this->getLanguageId()));
	}
}

