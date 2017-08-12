<?php

namespace FernleafSystems\Apis\Wordpress\Org\Plugins;

use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

class PluginInfoVO {

	use StdClassAdapter;

	/**
	 * @return string
	 */
	public function getAuthor() {
		return $this->getStringParam( 'author' );
	}

	/**
	 * @return int
	 */
	public function getCountDownloads() {
		return $this->getNumericParam( 'downloaded' );
	}

	/**
	 * @return int
	 */
	public function getCountRatings() {
		return $this->getNumericParam( 'num_ratings' );
	}

	/**
	 * @return string
	 */
	public function getCurrentVersion() {
		return $this->getStringParam( 'version' );
	}

	/**
	 * @return string YYYY-MM-DD
	 */
	public function getDateAdded() {
		return $this->getStringParam( 'added' );
	}

	/**
	 * @return string e.g '2017-08-04 10:14am GMT'
	 */
	public function getDateLastUpdated() {
		return $this->getStringParam( 'last_updated' );
	}

	/**
	 * @return array associative where keys are version numbers, values are download URIs
	 */
	public function getDownloadLink() {
		return $this->getArrayParam( 'download_link' );
	}

	/**
	 * @return string
	 */
	public function getHomepage() {
		return $this->getStringParam( 'homepage' );
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->getStringParam( 'name' );
	}

	/**
	 * @return array associative where keys are version numbers, values are download URIs
	 */
	public function getTags() {
		return $this->getArrayParam( 'tags' );
	}

	/**
	 * @return array associative where keys are version numbers, values are download URIs
	 */
	public function getVersions() {
		return $this->getArrayParam( 'versions' );
	}

	/**
	 * @return int (as a percentage out of 100, e.g. 98)
	 */
	public function getRatingAverage() {
		return $this->getNumericParam( 'rating' );
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
	public function getSections() {
		return $this->getArrayParam( 'sections' );
	}

	/**
	 * @return array
	 */
	public function getSection_Description() {
		return $this->getSections()[ 'description' ];
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
	public function getSlug() {
		return $this->getStringParam( 'slug' );
	}

	/**
	 * @return string
	 */
	public function getWordPressVersionRequired() {
		return $this->getStringParam( 'requires' );
	}
}
