<?php
class SearchFilterModule extends FilterModule {
	public function onAnyError($aContainer) {
		$aError = &$aContainer[0];
		
	}
	
	public function onBeforePageFill($oCurrentPage, $oTemplate) {
		
	}
	
	public function onDefaultPageTypeFilledContainer($oContainer, $oPage, $oTemplate, $oFrontendTemplate, $iModuleId) {
		
	}
	
	public function onDefaultPageTypeFilledContainerWithModule($oContentObject, $oModule, $oTemplate, $oFrontendTemplate, $iModuleId) {
		
	}
	
	public function onErrorEmailSend($aContainer) {
		$sAddress = &$aContainer[0];
		
	}
	
	public function onErrorLog($aContainer) {
		$sLogFilePath = &$aContainer[0];
		$aError = &$aContainer[1];
		$sErrorMessage = &$aContainer[2];
		$iMode = &$aContainer[3];
		$sDestination = &$aContainer[4];
		
	}
	
	public function onErrorPrint($aContainer) {
		$aError = &$aContainer[0];
		
	}
	
	public function onFillPageAttributes($oCurrentPage, $oTemplate) {
		
	}
	
	public function onFillPageAttributesFinished($oCurrentPage, $oTemplate) {
		
	}
	
	public function onMailGroups($aContainer) {
		$aMailGroups = &$aContainer[0];
		
	}
	
	public function onMailGroupsRecipients($aMailGroups, $aContainer) {
		$aRecipients = &$aContainer[0];
		
	}
	
	public function onNavigationItemChildrenRequested($oNavigationItem) {
		
	}
	
	public function onNavigationPathFound($oRootNavigationItem, $oMatchingNavigationItem) {
		
	}
	
	public function onPageHasBeenSet($oCurrentPage, $bIsNotFound, $oCurrentNavigationItem) {
		
	}
	
	public function onPageNotFound() {
		
	}
	
	public function onPageNotFoundDetectionComplete($bIsNotFound, $oCurrentPage, $oCurrentNavigationItem, $aContainer) {
		$bIsNotFoundMutable = &$aContainer[0];
		
	}
	
	public function onRequestFinished($aContainer) {
		$oCurrentPage = &$aContainer[0];
		$bIsDynamic = &$aContainer[1];
		$bIsAjaxRequest = &$aContainer[2];
		$bIsCached = &$aContainer[3];
		
	}
	
	public function onRichtextWriteTagForIdentifier($sTagName, $aContainer, $oIdentifier, $sTagContent, $mCallbackContext) {
		$aParameters = &$aContainer[0];
		
	}
	
	public function onUserLoggedIn($oUser, $aContainer) {
		$iUserLoginBitmap = &$aContainer[0];
		
	}
}