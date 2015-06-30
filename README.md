# Languages 
Languages allows you to easily make a multi-language website.

## How is it works

When a users opens the website, the API will gets the user's country using  the `geoip_country_code_by_name` function from the **[GeoIP API][4]**. 
Then the API searches the configuration files and gets the right language and then by using the user's language the API gets the right message. If the user has a language cookie, the API will ignore the first step and will get the right message using the user's language saved on the cookie.

## Installing

Install using composer
```json
{
    "require": {
        "rebelox/languages": "^1.0"
    }
}
```

You can also [visit the releases][5] and **download** from there.

## Configuration

First of all you need to **configurate the api**, the configuration is easy, you just need to **create two files**, one will be the **languages file**, and the other will be the **messages file**.

#### Languages File

The languages file should be like this
```json
{
  "default": "default_language",
  "lang1": "countries",
  "lang2": "countries"
}
```
**Where:**
* **default** is the default language you want to your website use by default.
* **lang1 and lang2** are the languages you want to define.
* **countries** is the the list of countries that use that language.

Here's an exemple:
```json
{
	"default": "pt",
	"pt" : "BR,PT,AO",
	"en" : "UK,US,AU"
}
```

You may want to check [this list][1] to see all ISO-3166 country codes.

======
#### Messages File


The messages' file structures:
```json
{
	"message_name":{
		"lang1":"Message in the lang1",
		"lang2":"Message in the lang2"
	}
}
```
**Where**
* **message_name** is the name you want to give to your message, it's also known has the identifier.
* **lang1 and lang2** are the languages you defined on the languages file.
* **Message (..) lang1 and lang2** are the messages in the respective languages.

Here's an exemple:
```json
{
	"hello":{
		"pt":"Olá mundo",
		"en":"Hello World"
	}
}
```

## Basic Usage

```php
<?php

$message = new Languages;

echo $message->get("hello"); //note that the "hello" is the name of the message, a.k.a the identifier.

```

## Dependencies

To use this API you will need the **GeoIP extension**.  
First you will need to **install the .dll extension**, [follow this instructions guide][3]. Then you will need the **database**, to get the database just [click here][2] and then install on your apache/bin folder.

## Contributing

You're welcome to contribute to the better of this API, just file the issues under GitHub, or submit a pull request if you would like to contribute directly.

## Examples

You can find some examples on the examples' folder, just try it yourself.

## Build Tests

For now I don't have build tests available, I'm working on that...

  [1]:http://dev.maxmind.com/geoip/legacy/codes/iso3166/
  [2]:http://geolite.maxmind.com/download/geoip/database/GeoLiteCountry/GeoIP.dat.gz
  [3]:http://us3.php.net/manual/en/geoip.setup.php
  [4]:http://dev.maxmind.com/geoip/
  [5]:https://github.com/RebeloX/languages/releases
