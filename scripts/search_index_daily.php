#!/usr/bin/env php
<?php

require_once __DIR__ . '/../../../base/lib/inc.php';
try {
	set_error_handler(array('ErrorHandler', "handleError"));
	foreach(LanguageQuery::create()->filterByIsActive(true)->find() as $oLanguage) {
		$sLanguageId = $oLanguage->getId();
		$oModule = new UpdateSearchIndexFileModule(array(), $sLanguageId, true);
		$oModule->renderFile();
	}
} catch (Exception $oException) {
	ErrorHandler::handleException($oException);
}
