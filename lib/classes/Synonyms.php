<?php
class Synonyms {
	private static $SYNONYMS;
	private static $ROOT_WORDS;

	public static function rootFor($sWord, $sLanguageId = null, $bIsNormalized = true) {
		if(!$bIsNormalized) {
			$sWord = StringUtil::normalize($sWord);
		}
		$aRootWords = self::rootWords($sLanguageId);
		if(isset($aRootWords[$sWord])) {
			return $sWord;
		}
		$aSynonyms = self::synonyms($sLanguageId);
		if(!isset($aSynonyms[$sWord])) {
			return $sWord;
		}
		return $aSynonyms[$sWord];
	}
	
	private static function init() {
		if(self::$SYNONYMS === null) {
			self::$SYNONYMS = array();
			self::$ROOT_WORDS = array();
			$sSynonyms = Settings::getInstance('synonyms')->getSettingsArray();
			foreach($sSynonyms as $sLanguage => $aSynonymList) {
				self::$SYNONYMS[$sLanguageId] = array();
				self::$ROOT_WORDS[$sLanguageId] = array();
				foreach($aSynonymList as $sRootWord => $aSynonyms) {
					$sRootWord = StringUtil::normalize($sRootWord);
					foreach($aSynonyms as $iKey => $sSynonym) {
						self::$SYNONYMS[$sLanguageId][StringUtil::normalize($sSynonym)] = $sRootWord;
					}
					self::$ROOT_WORDS[$sLanguageId][$sRootWord] = true;
				}
			}
		}
	}

	private static function synonyms($sLanguageId = null) {
		self::init();
		if($sLanguageId === null) {
			$sLanguageId = Session::language();
		}
		if(isset(self::$SYNONYMS[$sLanguageId])) {
			return &self::$SYNONYMS[$sLanguageId];
		}
		return array();
	}
	
	private static function rootWords($sLanguageId = null) {
		self::init();
		if($sLanguageId === null) {
			$sLanguageId = Session::language();
		}
		if(isset(self::$ROOT_WORDS[$sLanguageId])) {
			return &self::$ROOT_WORDS[$sLanguageId];
		}
		return array();
	}
	
}
