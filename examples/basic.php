<?php
	
require_once('../vendor/autoload.php');

use Language\Language;

$language = new Language(array(
	'languages_path' => __DIR__ . "/config/languages.json",
	'messages_path' => __DIR__ . "/config/messages.json"
	
));

echo $language->get('hello');
