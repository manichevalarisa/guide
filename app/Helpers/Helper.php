<?php

use Illuminate\Support\Facades\File;

/**
 * Get languages array from the file.
 *
 * @return mixed
 */
if (!function_exists('app_languages_from_file')) {
    function app_languages_from_file()
    {
        return ['en'];
    }
}

/**
 * Get translatable text.
 * @param string $text
 *
 * @return mixed
 */
if (!function_exists('t')) {
    function t(string $text, $caseInsensitive = true, $lang = false)
    {
        return $text;
    }
}

/**
 * Get the current lang.
 *
 * @return mixed
 */
if (!function_exists('lang')) {
    function lang()
    {
        return 'en';
    }
}
