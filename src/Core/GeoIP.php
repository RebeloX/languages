<?php
namespace Language\Core;

class GeoIP
{
	
	/* Since the objective is to get the language we don't bother if the client is using a proxy or not, he can change the language by him self. */
	public function get_client_ip() {
		return $_SERVER['REMOTE_ADDR'];
	}
	
	/* Get the client's country using his IP Address*/
	public function get_client_country(){
		$country = geoip_country_code_by_name($this->get_client_ip());
		return ($country) ? ($country) : (''); //If we get a country we will return the country ifnot we will return null and use the default language.
	}
}
