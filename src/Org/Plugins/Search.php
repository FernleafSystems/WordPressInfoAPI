<?php

namespace FernleafSystems\Apis\Wordpress\Org\Plugins;

use FernleafSystems\Apis\Wordpress\Org\Api;

/**
 * Class Search
 * @package FernleafSystems\Apis\Wordpress\Org\Plugins
 */
class Search extends Api {

	const API_ACTION = 'query_plugins';
	const API_VERSION = '1.1';

	/**
	 * @return PluginInfoVO[]
	 */
	public function search() {
		$aAllResults = array();

		$nPage = 1;
		do {
			$aResults = $this->setRequestDataItem( 'page', $nPage++ )
							 ->setRequestDataItem( 'per_page', 100 )
							 ->send()
							 ->getDecodedResponseBody();

			$bHasResults = !empty( $aResults );
			if ( $bHasResults ) {
				$aResults = array_map(
					function ( $aMember ) {
						return ( new PluginInfoVO() )->applyFromArray( $aMember );
					},
					$aResults
				);
				$aAllResults = array_merge( $aAllResults, $aResults );
			}
		} while ( $bHasResults && ( count( $aAllResults ) < $this->getResultsLimit() ) );

		return $aAllResults;
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
		return sprintf( '%s/info/%s', $this->getContext(), $this->getVersion() );
	}
}
