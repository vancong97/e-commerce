<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;
use App\Models\Order;

class MailFriday extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subWeek = Carbon::now()->subWeek();
        $now = Carbon::now();
        $orders = Order::with('user')->whereBetween('created_at', array($subWeek, $now))->get();
        return $this->markdown('client.email.mailfriday')
                    ->with([
                        'orders' => $orders,
                    ]);
    }
}
