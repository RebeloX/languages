<?php

require_once('../vendor/autoload.php');

use Language\Language;

$translate = new Language(array(
	'languages_path' => __DIR__ . "/config/languages.json",
	'messages_path' => __DIR__ . "/config/messages.json"	
));		

if(isset($_GET['lang'])){
	
	//we should verify if the language exist..
	
	$translate->save_lang($_GET['lang'],1000*3600);
	header('location: cookie.php');
}
	
echo $translate->get('hello');

?>
<br>
<meta charset="utf-8">
<a href="?lang=pt_pt">Português</a>
<a href="?lang=eng_us">English (US)</a>
<a href="?lang=fr_fr">French</a>
