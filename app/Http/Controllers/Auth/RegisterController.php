<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Services\Helpers\NexmoService;

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

    use RegistersUsers {

        register as registration;
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/two_face';

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|min:10|max:45',
            'address' => 'required',

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
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'address' => $data['address'],
            'secret_code' => $data['secret_code'],
            'role_id' => 1,
        ]);
    }

    public function register(Request $request)
{
    $this->validator($request->all())->validate();

    $secret_code = app('pragmarx.google2fa');

    $registrationData = $request->all();

    $registrationData['secret_code'] = $secret_code->generateSecretKey();

    $request->session()->flash('registration_data', $registrationData);

    $qrImage = $secret_code->getQRCodeInline(
        config('app.name'),
        $registrationData['email'],
        $registrationData['secret_code']
    );

    return view('google2fa.register', ['qrImage' => $qrImage, 'secret' => $registrationData['secret_code']]);
}

    public function completeRegistration(Request $request)
    {
        $request->merge(session('registration_data'));

        return $this->registration($request);
    }
}
