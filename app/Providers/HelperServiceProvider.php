<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if (!function_exists('is_active')) {
            function is_active($url_pattern): bool {
                return request()->is("$url_pattern*");
            }
        }

        if(!function_exists('reformat_permission_name')) {
            function reformat_permission_name(string $string): string {
                $string = str_replace('_', ' ', $string);
                $string[0] = strtoupper($string[0]);
                return $string;
            }
        }
    }
}
