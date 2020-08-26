<?php

if(!function_exists('isRoute')) {
    function isRoute($route) {
        if(Route::currentRouteName() == $route) {
            echo 'active';
        };
    }
}

if(!function_exists('menuOpen')){
    function menuOpen($route) {
        if(Route::currentRouteName() == $route) {
            echo 'menu-open';
        };
    }
}

if(!function_exists('admin')) {
    function admin() {
        return auth()->user();
    }
}

if(!function_exists('isAdmin')) {
    function isAdmin() {
        return admin()->role('admin');
    }
}

if(!function_exists('isWritter')){
    function isWritter(){
        return admin()->role('writter');
    }
}

if(!function_exists('isPublicWriter')){
    function isPublicWriter(){
        return admin()->role('public_writer');
    }
}


if(!function_exists('uploadImage')) {
    function uploadImage($image, $folder) {
        $name = time().'.'.$image->getClientOriginalExtension();

        $path = \Storage::disk('public')->put($folder, $image);
        return \URL::to('storage/'.$path);
    }
}

if(!function_exists('deleteImage')) {
    function deleteImage($image) {
        $path = 'settings/'.basename($image);
        \Storage::disk('public')->delete($path);
    }
}


if(!function_exists('recentUsers')) {
    function recentUsers(){
        return App\User::orderBy('updated_at', 'desc')->take(20)->get();
    }
}


if(!function_exists('totalUsers')) {
    function totalUsers(){
        return App\User::count();
    }
}



if(!function_exists('settings')) {
    function settings($value = null) {

        $settings = new App\Models\Setting();

        if($value) {
            $setting = $settings->select('value')->where('key', $value)->first();
            if($setting) return $setting->value;
            return '';
        }

        $array = array();

        foreach($settings->all() as $setting) {
            if($setting) {
                $array[$setting->key] = $setting->value;
            }
        }

        return $array;
    }
}


function strBefore($what, $inthat) {
    return substr($inthat, 0, strpos($inthat, $what));
};


if(!function_exists('strbetween')) {
    function strbetween($char1, $char2, $string) {
        $firstresult = substr($string, strpos($string, $char1) + strlen($char1), strlen($string)) ;
        return substr($firstresult, 0, strpos($firstresult, $char2));
    }
}

if(!function_exists('browser_name')){
    function browser_name($user_agent, $device = 0) {
        if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
        elseif (strpos($user_agent, 'Edge')) return 'Edge';
        elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
        elseif (strpos($user_agent, 'Safari')) return 'Safari';
        elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
        elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';
        return 'Other';
    }
}


