<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // validation for alpha and space
        Validator::extend('alpha_space', function ($attribute, $value, $parameters, $validator) {
            // Check if the value contains only alphabets and spaces
            return preg_match('/^[\pL\s]+$/u', $value);
        });

        Validator::replacer('alpha_space', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, ':attribute must contain only alphabets and spaces.');
        });
    }
}
