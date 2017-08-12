<?php

namespace FernleafSystems\Apis\Wordpress\Org\Plugins\Operations;

use FernleafSystems\Apis\Wordpress\Org\Plugins\PluginInfoVO;

/**
 * Class SortByNps
 * @package FernleafSystems\Apis\Wordpress\Org\Plugins\Operations
 */
class SortByNps {

	/**
	 * @param PluginInfoVO[] $aSearchResults
	 */
	public function sort( &$aSearchResults ) {
		usort( $aSearchResults,
			function ( $o1, $o2 ) {
				/** @var PluginInfoVO $o1 */
				/** @var PluginInfoVO $o2 */
				$nNp1 = $o1->getNpsScore();
				$nNp2 = $o2->getNpsScore();
				return ( $nNp1 == $nNp2 ) ? 0 : ( $nNp1 < $nNp2 ) ? -1 : 1;
			}
		);
	}
}