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
	 * @return array associative where keys are version numbers, values are download URIs
	 */
	public function getVersions() {
		return $this->getArrayParam( 'versions' );
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
	 * @return string
	 */
	public function getWordPressVersionRequired() {
		return $this->getStringParam( 'requires' );
	}
}
