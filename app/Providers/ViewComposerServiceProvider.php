<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 26/02/2016
 * Time: 17:49
 */

namespace opinion\Providers;


use Illuminate\Contracts\View\Factory;
use Illuminate\Support\ServiceProvider;
use opinion\Composers\CurrentUserComposer;
class ViewComposerServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */

    public function boot(Factory $factory){

        $factory->composer('*', CurrentUserComposer::class);


    }
    public function register()
    {
        // TODO: Implement register() method.
    }
}