<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\CheckMail;
use Illuminate\Support\Facades\Crypt;
use DB;
use Auth;

class LoginController extends Controller
{
    public function getLogin(){

        return view('admin.login');
    }

    public function postLogin(Request $request) {

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            $secret_code = rand(0,100000000);
            $encrypted = Crypt::encryptString($secret_code);
            $user = Auth::user();
            $user->secret_code = $encrypted;
            $user->save();
            $decrypted = Crypt::decryptString($encrypted);
            Mail::to($request->user()->email)->send(new CheckMail($decrypted));

            return redirect()->intended('/admin_test/check-login');
        }
        return redirect()->intended('/admin_test/login')->with('error','Tài khoản hoặc mật khẩu không chính xác');
    }

    public function getCheckLogin() {

        return view('admin.checklogin');
    }

    public function postCheckLogin(Request $request) {
        $otp = $request['otp'];
        $user = Auth::user();
        $email = Auth::user()->email;
        $result = DB::table('users')->select('secret_code')->where('email',$email)->first();
        $otp_db = $result->secret_code;
        $decrypted = Crypt::decryptString($otp_db);

        if ($otp == $decrypted) {

           return redirect()->intended('/admin/order');
        }

        return redirect('/admin_test/check-login')->with('errors','Mã OTP không đúng');

    }
}
