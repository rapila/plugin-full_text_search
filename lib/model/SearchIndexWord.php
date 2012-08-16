<?php

/**
 * @package    propel.generator.model
 */
class SearchIndexWord extends BaseSearchIndexWord {
	
	public function incrementCount() {
		$this->setCount($this->getCount()+1);
	}
}

