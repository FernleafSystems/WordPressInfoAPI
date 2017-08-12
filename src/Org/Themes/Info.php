<?php

namespace FernleafSystems\Apis\Wordpress\Org\Themes;

use FernleafSystems\Apis\Wordpress\Org\Common\InfoRetriever;

/**
 * Class Info
 * @package FernleafSystems\Apis\Wordpress\Org\Themes
 */
class Info extends Base {

	const CONTEXT = 'themes';
	const API_ACTION = 'theme_information';

	use InfoRetriever;

	/**
	 * @return ThemeInfoVO|null
	 */
	public function retrieveInfo() {
		$oItem = null;
		$this->setIsSerializedResponse( true )
			 ->send();
		if ( !$this->hasError() ) {
			$oItem = ( new ThemeInfoVO() )->applyFromArray( $this->getDecodedResponseBody() );
		}
		return $oItem;
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( '/%s/info/%s/', $this->getContext(), $this->getVersion() );
	}
}
