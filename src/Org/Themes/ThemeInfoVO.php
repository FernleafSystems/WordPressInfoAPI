<?php

namespace FernleafSystems\Apis\Wordpress\Org\Themes;

use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class ThemeInfoVO
 * @package FernleafSystems\Apis\Wordpress\Org\Themes
 */
class ThemeInfoVO {

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
	 * @return int (as a percentage out of 100, e.g. 98)
	 */
	public function getRatingAverage() {
		return $this->getNumericParam( 'rating' );
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
	 * @return string
	 */
	public function getSlug() {
		return $this->getStringParam( 'slug' );
	}
}
