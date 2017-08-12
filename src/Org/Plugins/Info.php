<?php

namespace FernleafSystems\Apis\Wordpress\Org\Plugins;

use FernleafSystems\Apis\Wordpress\Org\Api;
use FernleafSystems\Apis\Wordpress\Org\Common\InfoRetriever;

/**
 * Class Info
 * @package FernleafSystems\Apis\Wordpress\Org\Plugins
 */
class Info extends Api {

	const API_ACTION = 'plugin_information';

	use InfoRetriever;

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
	protected function getUrlEndpoint() {
		return sprintf( '%s/info/%s/%s.json', $this->getContext(), $this->getVersion(), $this->getSlug() );
	}
}
