<?php
/**
 * Разработал Максим Руденко
 * email: rudenko.programmer@gmail.com
 * Дата: 10.04.2019
 */

namespace RudenkoProgrammer\GetResponseLaravel;

use GuzzleHttp\Exception\ClientException;

/**
 * documentation https://guzzle.readthedocs.io
 *
 * Class GetResponseHttpClient
 *
 * @package RudenkoProgrammer\GetResponseLaravel
 */
class GetResponseHttpClient {

	private $client = null;
	private $base_url = "https://api.getresponse.com/v3/";
	private $api_key;

	/**
	 * GetResponseHttpClient constructor.
	 */
	public function __construct() {
		$this->client = new \GuzzleHttp\Client([
			'base_uri' => $this->base_url
		]);
		$this->api_key = config('get-response-laravel.key');
	}

	/**
	 * @param string $uri
	 * @param array $form_params
	 *
	 * @return string
	 */
	public function get(string $uri, array $form_params = []){
		try{
			$response =  $this->client->get($uri, [
				"form_params" => $form_params,
				"headers" => [
					"X-Auth-Token" => "api-key ".$this->api_key
				]
			]);
			return $response->getBody()->getContents();
		}catch (ClientException $exception){
			return $exception;
		}
	}
}
