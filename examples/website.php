<?php 
	
require_once('../vendor/autoload.php');

use Language\Language;

$language = new Language(array(
	'languages_path' => __DIR__ . "/config/languages.json",
	'messages_path' => __DIR__ . "/config/messages.json"
));

if(isset($_GET['lang'])){
	
	$language->save_lang($_GET['lang'],1000*3600);
	header('location: website.php');
}
	
?>

<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $language->get('title'); ?></title>	
	</head>
	<body style="margin-top: 200px">
		<center><h1><?php echo $language->get('welcome');?></h1>
		
		<p><?php echo $language->get('simple'); ?></p>
		<p><?php echo $language->get('find'); ?></p>
		<p><?php echo $language->get('like'); ?></p>
		
		<a href="?lang=pt_pt"><?php echo $language->get('Portuguese'); ?></a> <a href="?lang=eng_us"><?php echo $language->get('English'); ?></a></center>
	</body>
</html>
