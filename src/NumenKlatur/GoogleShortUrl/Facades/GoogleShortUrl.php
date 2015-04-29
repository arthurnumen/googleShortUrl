<?php namespace NumenKlatur\GoogleShortUrl\Facades;

use Illuminate\Support\Facades\Facade;

class GoogleShortUrlApi extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'googleShortUrl'; }

}