<?php
namespace Language\Core;

class Load {
	
	public static function get_languages($path)
	{
		return json_decode(file_get_contents($path),TRUE);
	}
	
	public static function get_messages($path)
	{
		return json_decode(file_get_contents($path),TRUE);
	}	
}
