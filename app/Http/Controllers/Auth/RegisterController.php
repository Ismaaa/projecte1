<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/portada';

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
            'name' => 'required|max:255',
            'surnames' => 'required|max:255',
            'dni' => 'required|min:8|max:10|unique:users',
            'email' => 'required|email|min:3|max:255|unique:users',
            'city' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|min:8|max:20|unique:users',
            'bio' => 'max:255',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'surnames' => $data['surnames'],
            'dni' => $data['dni'],
            'email' => $data['email'],
            'city' => $data['city'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'bio' => $data['bio'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
