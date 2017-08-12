<?php

namespace FernleafSystems\Apis\Wordpress\Org\Plugins;

use FernleafSystems\Apis\Wordpress\Org\Api;

/**
 * Class Info
 * @package FernleafSystems\Apis\Wordpress\Org\Plugins
 */
class Info extends Api {

	const API_ACTION = 'plugin_information';
	const REQUEST_METHOD = 'post'; // in this case it could be either

	/**
	 * @return PluginInfoVO|null
	 */
	public function retrieveInfo() {
		$oPlugin = null;
		$this->send();
		if ( !$this->hasError() ) {
			$oPlugin = ( new PluginInfoVO() )->applyFromArray( $this->getDecodedResponseBody() );
		}
		return $oPlugin;
	}

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
		return sprintf( '%s/info/%s/%s.json', $this->getContext(), $this->getVersion(), $this->getSlug() );
	}
}
