<?php
/**
 * Разработал Максим Руденко
 * email: rudenko.programmer@gmail.com
 * Дата: 13.04.2019
 */

namespace RudenkoProgrammer\GetResponseLaravel;


class GetResponseResponse {
	private $status;
	private $response;

	/**
	 * GetResponseResponse constructor.
	 *
	 * @param $status
	 * @param $response
	 */
	public function __construct( $status, $response ) {
		$this->status   = $status;
		$this->response = $response;
	}

	/**
	 * @return mixed
	 */
	public function getStatus():bool {
		return $this->status;
	}

	/**
	 * @return \Illuminate\Http\Response | \RudenkoProgrammer\GetResponseLaravel\GetResponseClientException
	 */
	public function getResponse() {
		return $this->response;
	}

}
