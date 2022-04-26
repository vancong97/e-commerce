<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\PHPGangsta_GoogleAuthenticato;
class VerifyTwoFaceController extends Controller
{
    public function index()
    {
        return view("verify_two_face.index");
    }

    public function verify(Request $request)
    {
        $this->validate($request, [
            "code" => "required|digits:6",
        ]);

        $googleAuthenticator = new \PHPGangsta_GoogleAuthenticator();
        $secretCode = auth()->user()->secret_code;

        if (!$googleAuthenticator->verifyCode($secretCode, $request->get("code"), 0)) {
            $errors = new MessageBag();
            $errors->add("code", "Invalid authentication code");
            return back()->withErrors($errors);
        }

        session(["2fa_verified" => true]);
        return redirect("/admin/order");
    }
}
