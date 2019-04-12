<?php
/**
 * Разработал Максим Руденко
 * email: rudenko.programmer@gmail.com
 * Дата: 13.04.2019
 */

namespace RudenkoProgrammer\GetResponseLaravel;


use GuzzleHttp\Exception\ClientException;

class GetResponseClientException extends ClientException {

	private $http_status;
	private $code_description;
	private $more_info;

	/**
	 * GetResponseClientException constructor.
	 *
	 * @param \GuzzleHttp\Exception\ClientException $exception
	 */
	public function __construct(ClientException $exception) {
		parent::__construct(
			$exception->getMessage(),
			$exception->getRequest(),
			$exception->getResponse(),
			$exception->getPrevious(),
			$exception->getHandlerContext()
		);

		$obj_contents = \GuzzleHttp\json_decode($this->getResponse()->getBody()->getContents());

		$this->code = $obj_contents->code;
		$this->http_status = $obj_contents->httpStatus;
		$this->message = $obj_contents->message;
		$this->code_description = $obj_contents->codeDescription;
		$this->more_info = $obj_contents->moreInfo;
	}

	/**
	 * @return mixed
	 */
	public function getHttpStatus() {
		return $this->http_status;
	}

	/**
	 * @return mixed
	 */
	public function getCodeDescription() {
		return $this->code_description;
	}

	/**
	 * @return mixed
	 */
	public function getMoreInfo() {
		return $this->more_info;
	}
}
