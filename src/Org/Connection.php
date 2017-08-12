<?php

namespace FernleafSystems\Apis\Wordpress\Org;

/**
 * Class Connection
 * @package FernleafSystems\Apis\Wordpress\Org
 */
class Connection extends \FernleafSystems\Apis\Base\Connection {

	const BASE_URL = 'https://api.wordpress.org/';

	/**
	 * @return string
	 */
	public function getBaseUrl() {
		return self::BASE_URL;
	}
}
