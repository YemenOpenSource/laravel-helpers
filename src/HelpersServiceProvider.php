<?php

namespace YemeniOpenSource\LaravelHelpers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class HelpersServiceProvider extends ServiceProvider
{
    public function boot()
    {
    	if ($this->app->runningInConsole()) {
	        $this->commands([
	            Install::class
	        ]);
    	}

        // TODO: Use the path in created config. see InstallCommand.php
        if (File::exists(resource_path('helpers.php'))) {
        	require_once resource_path('helpers.php');
        }
    }
}