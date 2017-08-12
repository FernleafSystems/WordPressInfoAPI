<?php

namespace FernleafSystems\Apis\Wordpress\Org\Plugins;

use FernleafSystems\Apis\Wordpress\Org\Themes\ThemeInfoVO;

class PluginInfoVO extends ThemeInfoVO {

	/**
	 * @return string YYYY-MM-DD
	 */
	public function getDateAdded() {
		return $this->getStringParam( 'added' );
	}

	/**
	 * @param int $nAccuracy - the number of decimal places
	 * @return float
	 */
	public function getNpsScore( $nAccuracy = 4 ) {
		$aRs = $this->getRatings();
		$nNPS = ( $aRs[ 5 ] - $aRs[ 1 ] - $aRs[ 2 ] - $aRs[ 3 ] ) / $this->getCountRatings();
		return round( $nNPS, $nAccuracy );
	}

	/**
	 * @return array an associative array with keys "1", "2", "3", "4", "5"
	 */
	public function getRatings() {
		return $this->getArrayParam( 'ratings' );
	}

	/**
	 * @return array
	 */
	public function getSection_ChangeLog() {
		return $this->getSections()[ 'changelog' ];
	}

	/**
	 * @return array associative where keys are version numbers, values are download URIs
	 */
	public function getVersions() {
		return $this->getArrayParam( 'versions' );
	}

	/**
	 * @return string
	 */
	public function getWordPressVersionRequired() {
		return $this->getStringParam( 'requires' );
	}
}
