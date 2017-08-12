<?php

namespace FernleafSystems\Apis\Wordpress\Org;

class Api extends \FernleafSystems\Apis\Base\BaseApi {

	const CONTEXT = 'plugins';
	const API_ACTION = '';
	const API_VERSION = '1.0';

	/**
	 * @var string
	 */
	protected $sContext;

	/**
	 * @return string
	 */
	public function getAction() {
		return static::API_ACTION;
	}

	/**
	 * @return string
	 */
	public function getBaseUrl() {
		/** @var Connection $oCon */
		$oCon = $this->getConnection();
		return rtrim( $oCon->getBaseUrl(), '/' ) . '/';
	}

	/**
	 * @return array
	 */
	protected function prepFinalRequestData() {
		return array(
			'body' => array(
				'action'  => $this->getAction(),
				'request' => serialize( (object)$this->getRequestDataFinal() ),
			)
		);
	}

	/**
	 * @return string
	 */
	public function getContext() {
		return isset( $this->sContext ) ? $this->sContext : self::CONTEXT;
	}

	/**
	 * @return string
	 */
	public function getVersion() {
		return static::API_VERSION;
	}

	/**
	 * @param string $sContext
	 * @return $this
	 */
	public function setContext( $sContext ) {
		$this->sContext = $sContext;
		return $this;
	}
}