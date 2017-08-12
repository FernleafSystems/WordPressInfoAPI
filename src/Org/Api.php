<?php

namespace FernleafSystems\Apis\Wordpress\Org;

class Api extends \FernleafSystems\Apis\Base\BaseApi {

	const CONTEXT = 'plugins';
	const API_ACTION = '';
	const API_VERSION = '1.0';

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
	 * @return array|\stdClass|null
	 */
	public function getDecodedResponseBody() {
		$mResponse = null;
		if ( $this->isSerializedResponse() ) {
			$mResponse = new \stdClass();
			if ( !$this->hasError() ) {
				$mResponse = unserialize( $this->getResponseBodyContentRaw() );
			}
		}
		else {
			$mResponse = parent::getDecodedResponseBody();
		}
		return $mResponse;
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
		$sContext = $this->getParam( 'context' );
		return empty( $sContext ) ? static::CONTEXT : $sContext;
	}

	/**
	 * @return string
	 */
	public function getVersion() {
		return static::API_VERSION;
	}

	/**
	 * @return bool
	 */
	public function isSerializedResponse() {
		return (bool)$this->getParam( 'serialized_response' );
	}

	/**
	 * @param string $sContext
	 * @return $this
	 */
	public function setContext( $sContext ) {
		return $this->setParam( 'context', $sContext );
	}

	/**
	 * @param bool $bIsSerialized
	 * @return $this
	 */
	public function setIsSerializedResponse( $bIsSerialized ) {
		return $this->setParam( 'serialized_response', $bIsSerialized );
	}
}