<?php
/**
 * Разработал Максим Руденко
 * email: rudenko.programmer@gmail.com
 * Дата: 11.04.2019
 */

namespace RudenkoProgrammer\GetResponseLaravel;


class GetResponseContacts {

	/**
	 * @return string
	 */
	public static function getContacts() {
		$api_method = 'contacts/';
		$client = new GetResponseHttpClient();
		return $client->get($api_method);
	}


	public static function addContact( array $form_params = [], array $json_params = [] ) {
		$api_method = 'contacts/';
		$client = new GetResponseHttpClient();
		return $client->post($api_method, $form_params, $json_params);
	}
}
