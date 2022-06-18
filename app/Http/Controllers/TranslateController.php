<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TranslateController extends Controller
{
    /**
     * Change the language of the application.
     * @param Request $request
     * @param string $lang
     *
     * @return mixed
     */
    public function changeLanguage(Request $request, string $lang)
    {
        Session::put('app_locale', $lang);
        return redirect()->back();
    }
}
