<?php

namespace Taqmaninw\Apipack;

use Illuminate\Support\ServiceProvider;

class ApipackServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
      
        $this->app['google'] = $this->app->share(function($app) {
                    return new Eden_Google($app['config']);
                });
         $this->app->booting(function() {
                    $loader = \Illuminate\Foundation\AliasLoader::getInstance();
                    $loader->alias('google','Taqmaninw\Apipack\Facade\Google');
                });
        $this->app['facebook'] = $this->app->share(function($app) {
                    return new Eden_Facebook($app['config']);
                });
        $this->app->booting(function() {
                    $loader = \Illuminate\Foundation\AliasLoader::getInstance();
                    $loader->alias('fb', 'Taqmaninw\Apipack\Facade\Facebook');
                });
        $this->app['twitter'] = $this->app->share(function($app) {
                    return new Eden_Twitter($app['config']);
                });
        $this->app['dropbox'] = $this->app->share(function($app) {
                    return new Eden_Dropbox($app['config']);
                });
        $this->app['instagram'] = $this->app->share(function($app) {
                    return new Eden_Instagram($app['config']);
                });
        $this->app['paypal'] = $this->app->share(function($app) {
                    return new Eden_Paypal($app['config']);
                });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return array('apipack');
    }
 public function boot() 
    {
        $this->package('taqmaninw/apipack');
       
    }
}