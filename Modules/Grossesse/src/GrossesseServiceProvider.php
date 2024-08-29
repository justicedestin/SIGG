<?php

namespace Jdnk\Grossesse;
use Illuminate\Support\ServiceProvider;


class GrossesseServiceProvider extends ServiceProvider {

    public function register(){

    }

    public function boot(){
        $this->loadMigrationsFrom(__DIR__."/Database/Migrations");
        $this->loadRoutesFrom(__DIR__."/Routes/api.php");
    }

}


