<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Ticket;
use App\Models\TicketName;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function payment() {
        $payment = Cart::where('payment_status_id', 1)->first();
        $ticket_name = TicketName::all();
        return view('payment', [
            'payment' => $payment,
            'ticket_name' => $ticket_name,
        ]);
    }

    public function purchase(Request $request) {
        // dd(fake()->randomNumber(9));
        $regular_count = (int)$request['regular_count'];
        $vip_count = (int)$request['vip_count'];
        $payment_id = $request['payment_id'];

        if ($request['regular_count'] > 0) {
            for ($i = 0; $i < $regular_count; $i++) {
                Ticket::create([
                    'user_id' => auth()->user()->id,
                    'checkin_id' => 2,
                    'ticket_name_id' => 1,
                    'booking_id' => fake()->randomNumber(9),
                ]);
            }
        }

        if ($request['vip_count'] > 0) {
            for ($i = 0; $i < $vip_count; $i++) {
                Ticket::create([
                    'user_id' => auth()->user()->id,
                    'checkin_id' => 2,
                    'ticket_name_id' => 2,
                    'booking_id' => fake()->randomNumber(9),
                ]);
            }
        }

        Cart::where('id', $payment_id)->update(['payment_status_id'=> 2]);
        return redirect('/');
    }
}
