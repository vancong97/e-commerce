<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use Auth;

class ChangePassController extends Controller
{
    public function getChangePass()
    {
        return view('admin.password.index');
    }

    public function postChangePass(Request $request)
    {
        if (!(Hash::check($request['current-password'], Auth::user()->password))) {

            return redirect()->back()->with('error', 'Mật khẩu bạn nhập không đúng với mật khẩu hiện tại. Vui lòng thử lại');
        }
        if (strcmp($request['current-password'], $request['new-password']) == 0) {

            return redirect()->back()->with('error', 'Mật khẩu mới không thể giống như mật khẩu hiện tại của bạn. Vui lòng chọn một mật khẩu khác');
        }
        $user = Auth::user();
        $user->password = Hash::make($request['new-password']);
        $user->save();

        return redirect()->back()->with("success","Thay đổi mật khẩu thành công !");
    }
}
