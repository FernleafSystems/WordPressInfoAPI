<?php

namespace FernleafSystems\Apis\Wordpress\Org\Plugins;

use FernleafSystems\Apis\Wordpress\Org\Api;
use FernleafSystems\Apis\Wordpress\Org\Common\Searcher;

/**
 * Class Search
 * @package FernleafSystems\Apis\Wordpress\Org\Plugins
 */
class Search extends Api {

	const API_ACTION = 'query_plugins';

	use Searcher;

	/**
	 * @return PluginInfoVO[]
	 */
	public function search() {
		return array_map(
			function ( $aItem ) {
				return ( new PluginInfoVO() )->applyFromArray( $aItem );
			},
			$this->execSearch()
		);
	}
}
