<?php
namespace Language;

require_once('core/Load.php');
require_once('core/GeoIP.php');

use Language\Core\GeoIP;
use Language\Core\Load;

class Language
{
	protected $geo_ip; //object used on the GeoIP Class
	protected $langs; //the languages providade by the lang.json file
	protected $messages; //the messages providade by the messages.json file
	
	public function __construct($config = array()) //our construct method
	{
		$this->geo_ip = new GeoIP; //we create a new istance from the GeoIP class
	
		$this->langs = Load::get_languages($config['languages_path']);
		$this->messages = Load::get_messages($config['messages_path']);
	}
	
	public function get($message) //the get method, used to get a message
	{
		if($this->get_cookie_lang() != '') //we check if the cookie is not null (cookie exists)
 		{
			if(isset($this->messages[$message][$this->get_cookie_lang()])) //then we check if the cookie language exists
			{
				return $this->messages[$message][$this->get_cookie_lang()]; //if exists we return the message
			}
		}
		
		//if the cookie doesn't we exists we run this code
		
		$client_lang = $this->get_lang(); //get the user language
		
		foreach($this->messages[$message] as $lang => $text) //foreach trough the message and get the language and the text
		{
			if($lang == $client_lang) //if the language is equals to the user's language
			{
				return $text; //return the right text
			}
		}
		return $this->messages[$message][$this->langs['default']]; //if none of these if staments return we just return the message using the default language
	}
	
	public function get_lang() //get the user's language based on the GeoIP
	{
		
		foreach($this->langs as $lang => $locator) //loop trough the array
		{
			$countries = explode(",", $locator); //explode the countries "US,UK" will be "US" - "UK"
			foreach($countries as $country) //loop trought array
			{
				if($country == $this->geo_ip->get_client_country()) //check if the country is equal to the user's country
				{
					return $lang; //if so, return the language
				}
			}
		}
		return $this->langs['default']; //if we can't find the exact country we return the default language
	}
	
	public function save_lang($lang,$time) //this fuction saves the language via cookie so the user
	{
		setcookie("lang",$lang,time()+$time); //saving the language
	}
	
	public function get_cookie_lang() //get a cookie lang
	{

		if(isset($_COOKIE['lang'])) //check if the cookie exists
		{
			/* before returning the lang we must check if this lang exists on our config file */
			if(isset($this->langs[$_COOKIE['lang']]))
			{
				/* now we return the lang */
				return $_COOKIE['lang'];
			}
		}
		return ''; //we want to return a null string, this means that the cookie doesn't exist or is not "valid";
	}
}
