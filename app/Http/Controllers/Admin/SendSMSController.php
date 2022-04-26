<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SendSMSController extends Controller
{
    public function sendSMS()
    {
        $basic  = new \Nexmo\Client\Credentials\Basic('69e32e89', 'YtsEUhPDCSY5pIHw');
        $client = new \Nexmo\Client($basic);

        $message = $client->message()->send([
            'to' => '0399738226',
            'from' => 'sss',
            'text' => 'A text message sent using the Nexmo SMS API',
        ]);

        // dd('message send successfully');

        // $nexmo = app('Nexmo\Client');
        // $nexmo->message()->send([
        // 'to' => \Auth::user()->phone,
        // 'from' => config('app.name', 'Laravel'),
        // 'text' => 'Text message Sent From '.config('app.name', 'Laravel').' To confrim that this is your Phone Number.'
        // ]);
    }
}
