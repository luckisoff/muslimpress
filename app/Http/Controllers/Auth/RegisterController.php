<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    public function showRegistrationForm(){
        $file = \file_get_contents(asset('assets/country/countries.json'));
        $countries = \json_decode($file);
        // return $countries;
        return view('auth.register', compact('countries'));
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'slug'  => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'remember_token' => $data['_token']?:null,
            'mobile_number' => isset($data['mobile_number'])?$data['mobile_number']:null,
            'country'   => isset($data['country'])?$data['country']:null,
            'blood_group' => isset($data['blood_group'])?$data['blood_group']:null,
            'address'=> isset($data['address'])?$data['address']:null
        ]);
    }

    // public function register(Request $request){
    //     return $request->all();
    // }
}
