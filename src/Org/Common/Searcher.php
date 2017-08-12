<?php

namespace FernleafSystems\Apis\Wordpress\Org\Common;

/**
 * Trait Searcher
 * @package FernleafSystems\Apis\Wordpress\Org\Common
 */
trait Searcher {

	/**
	 * @return array[]
	 */
	protected function execSearch() {
		$aAllResults = array();

		$this->setIsSerializedResponse( true );

		$nLimit = $this->getResultsLimit();
		$this->setRequestDataItem( 'per_page', min( $nLimit, 25 ) );

		$nPage = 1;
		do {
			$oResults = $this->setRequestDataItem( 'page', $nPage++ )
							 ->send()
							 ->getDecodedResponseBody();

			$bHasResults = !empty( $oResults->{static::CONTEXT} );
			if ( $bHasResults ) {
				$aAllResults = array_merge( $aAllResults, $oResults->{static::CONTEXT} );
			}
		} while ( $bHasResults && ( count( $aAllResults ) < $nLimit ) );

		return array_slice( $aAllResults, 0, $nLimit );
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
