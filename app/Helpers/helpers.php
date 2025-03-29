<?php

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
