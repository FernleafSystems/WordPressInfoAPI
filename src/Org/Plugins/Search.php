<?php

namespace FernleafSystems\Apis\Wordpress\Org\Plugins;

use FernleafSystems\Apis\Wordpress\Org\Api;

/**
 * Class Search
 * @package FernleafSystems\Apis\Wordpress\Org\Plugins
 */
class Search extends Api {

	const API_ACTION = 'query_plugins';
	const API_VERSION = '1.0';
	const REQUEST_METHOD = 'post'; // in this case it could be either

	/**
	 * @return PluginInfoVO[]
	 */
	public function search() {
		$aAllResults = array();

		$nPage = 1;
		do {
			$oResults = $this->setRequestDataItem( 'page', $nPage++ )
							 ->setRequestDataItem( 'per_page', 25 )
							 ->send()
							 ->getDecodedResponseBody();

			$bHasResults = !empty( $oResults->plugins );
			if ( $bHasResults ) {
				$oResults = array_map(
					function ( $aMember ) {
						return ( new PluginInfoVO() )->applyFromArray( $aMember );
					},
					$oResults->plugins
				);
				$aAllResults = array_merge( $aAllResults, $oResults );
			}
		} while ( $bHasResults && ( count( $aAllResults ) < $this->getResultsLimit() ) );
		var_dump( count( $aAllResults ) );
		return $aAllResults;
	}

	/**
	 * @return \stdClass
	 */
	public function getDecodedResponseBody() {
		$oResponse = new \stdClass();
		if ( !$this->hasError() ) {
			$oResponse = unserialize( $this->getResponseBodyContentRaw() );
		}
		return $oResponse;
	}

	/**
	 * @return int
	 */
	public function getResultsLimit() {
		$nLimit = $this->getParam( 'results_limit' );
		if ( empty( $nLimit ) ) {
			$nLimit = 100;
		}
		return $nLimit;
	}

	/**
	 * @param int $nLimit
	 * @return $this
	 */
	public function setResultsLimit( $nLimit ) {
		return $this->setParam( 'results_limit', $nLimit );
	}

	/**
	 * @param string $sSearchTerm
	 * @return $this
	 */
	public function setSearchTerm( $sSearchTerm ) {
		return $this->setRequestDataItem( 'search', $sSearchTerm );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( '/%s/info/%s/', $this->getContext(), $this->getVersion() );
	}
}
