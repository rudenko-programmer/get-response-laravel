<?php
/**
 * Разработал Максим Руденко
 * email: rudenko.programmer@gmail.com
 * Дата: 10.04.2019
 */

namespace RudenkoProgrammer\GetResponseLaravel;


class GetResponseCampaigns {

	/**
	 * @return string
	 */
	public static function getCampaigns(){
		$api_method = 'campaigns/';
		$client = new GetResponseHttpClient();
		return $client->get($api_method);
	}

	/**
	 * @param string $id
	 *
	 * @return string
	 */
	public static function getCampaignsById( string $id ) {
		$api_method = 'campaigns/'.$id;
		$client = new GetResponseHttpClient();
		return $client->get($api_method);
	}
}
