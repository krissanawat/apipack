<?php namespace Taqmaninw\Apipack\Facade;

use Illuminate\Support\Facades\Facade;

class Paypal extends Facade {

    protected static function getFacadeAccessor() {
            return 'paypal'; }

}
