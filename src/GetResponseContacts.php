<?php
/**
 * Разработал Максим Руденко
 * email: rudenko.programmer@gmail.com
 * Дата: 11.04.2019
 */

namespace RudenkoProgrammer\GetResponseLaravel;

use Exception;

class GetResponseContacts {

	/**
	 * @return string
	 */
	public static function getContacts() {
		$api_method = 'contacts/';
		$client = new GetResponseHttpClient();
		return $client->get($api_method);
	}


	/**
	 * @param array $form_params
	 *
	 * @return \RudenkoProgrammer\GetResponseLaravel\GetResponseResponse
	 */
	public static function addContact( array $form_params = []) {
		$api_method = 'contacts/';
		$client = new GetResponseHttpClient();
		$response = $client->post($api_method, $form_params);
		if ($response instanceof Exception){
			return new GetResponseResponse(false, $response);
		}
		return new GetResponseResponse(true, $response);
	}
}
