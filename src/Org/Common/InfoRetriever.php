<?php

namespace FernleafSystems\Apis\Wordpress\Org\Common;

/**
 * Trait InfoRetriever
 * @package FernleafSystems\Apis\Wordpress\Org\Common
 */
trait InfoRetriever {

	/**
	 * @return string
	 */
	public function getSlug() {
		return $this->getRequestDataItem( 'slug' );
	}

	/**
	 * @param string $sSlug
	 * @return $this
	 */
	public function setSlug( $sSlug ) {
		return $this->setRequestDataItem( 'slug', $sSlug );
	}

	/**
	 * @param array $aFields
	 * @return $this
	 */
	public function setFields( $aFields ) {
		return $this->setRequestDataItem( 'fields', $aFields );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( '/%s/info/%s/%s.json', $this->getContext(), $this->getVersion(), $this->getSlug() );
	}
}
