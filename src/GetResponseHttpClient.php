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
	private $headers;

	/**
	 * GetResponseHttpClient constructor.
	 */
	public function __construct() {
		$this->client = new \GuzzleHttp\Client([
			'base_uri' => $this->base_url
		]);
		$this->api_key = config('get-response-laravel.key');
		$this->headers = [
			"X-Auth-Token" => "api-key ".$this->api_key
		];
	}

	/**
	 * @param string $uri
	 * @param array $form_params
	 * @param array $additional_params
	 *
	 * @return \Exception|\GuzzleHttp\Exception\ClientException|\Psr\Http\Message\ResponseInterface
	 */
	public function get(string $uri, array $form_params = [], array $additional_params = []){
		try{
			$params = [
				"headers" => $this->headers
			];

			if(count($form_params)){
				$params["form_params"] = $form_params;
			}

			if(count($additional_params)){
				$params = array_merge($params, $additional_params);
			}

			$response =  $this->client->get($uri, $params);
			return $response;
		}catch (ClientException $exception){
			return $exception;
		}
	}

	/**
	 * @param string $uri
	 * @param array $form_params
	 * @param array $additional_params
	 *
	 * @return \Exception|\GuzzleHttp\Exception\ClientException|\Psr\Http\Message\ResponseInterface
	 */
	public function post(string $uri, array $form_params = [], array $additional_params = []){
		try{
			$params = [
				"headers" => $this->headers
			];

			if(count($form_params)){
				$params["form_params"] = $form_params;
			}

			if(count($additional_params)){
				$params = array_merge($params, $additional_params);
			}

			$response =  $this->client->post($uri, $params);
			return $response;
		}catch (ClientException $exception){
			return $exception;
		}
	}
}
