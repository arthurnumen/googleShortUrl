googleShortUrl
=============
Provides a Laravel package to communicate with Google Short Url API.

Instalation
=============
Add googleShorUrl to your composer.json file.

    require : {
        "numenklatur/google-short-url": "1.0"
    }

Or with composer command:

    composer require "numenklatur/google-short-url": "1.0"

Add provider to your app/config/app.php providers

    'NumenKlatur\GoogleShortUrl\GoogleShortUrlServiceProvider',

Publish config

For Laravel 4 use:

    php artisan config:publish numenklatur/google-short-url
    
Add alias to app/config/app.php aliases

    'ShortUrl' => 'NumenKlatur\GoogleShortUrl\Facades\GoogleShortUrlApi',
    
Usage
=====

Shorten links

    ShortUrl::shorten('http://numenklatur.me/');

    Response format: JSON

    {
      "kind": "urlshortener#url",
      "id": "http://goo.gl/xa55D2",
      "longUrl": "http://numenklatur.me/"
    }

Expand links

    ShortUrl::expand('http://bit.ly/ze6poY');

    Response format: JSON

    {
      "kind": "urlshortener#url",
      "id": "http://goo.gl/xa55D2",
      "longUrl": "http://numenklatur.me/",
      "status": "OK"
    }
