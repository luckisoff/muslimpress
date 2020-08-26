<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index($set_locale = 'hi'){

        $locale_codes = [];


        foreach(config('app.available_locales') as $locale){
            $locale_codes[] = $locale['code'];
        }


        if(!in_array($set_locale, $locale_codes)) abort(404, 'Page not found');

        return redirect($set_locale);

    }
}
