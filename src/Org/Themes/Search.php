<?php

namespace FernleafSystems\Apis\Wordpress\Org\Themes;

use FernleafSystems\Apis\Wordpress\Org\Common\Searcher;

/**
 * Class Search
 * @package FernleafSystems\Apis\Wordpress\Org\Themes
 */
class Search extends Base {

	const API_ACTION = 'query_themes';

	use Searcher;

	/**
	 * @return ThemeInfoVO[]
	 */
	public function search() {
		return array_map(
			function ( $aItem ) {
				return ( new ThemeInfoVO() )->applyFromArray( $aItem );
			},
			$this->execSearch()
		);
	}
}
