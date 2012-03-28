<?php



/**
 * Skeleton subclass for representing a row from the 'search_index' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.model
 */
class SearchIndex extends BaseSearchIndex {
	public function getLink() {
		return LinkUtil::link($this->getLinkArray(), 'FrontendManager');
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
		$oTemplate->replaceIdentifier("url", $this->getLink());
	}
} // SearchIndex
