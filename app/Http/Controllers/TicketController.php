<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CheckIn;
use App\Models\User;
use App\Models\Ticket;
use App\Models\TicketName;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index() {
        $tickets = TicketName::all();

        return view('tickets', [
            'tickets' => $tickets,
        ]);
    }

    public function checkout(Request $request) {
        // dd($request);
        $request->validate([
            'subtotalValue' => 'required',
            'regularCount' => 'nullable',
            'vipCount' => 'nullable'
        ]);

        $data['user_id'] = auth()->user()->id;
        $data['regular_count'] = $request['regularCount'];
        $data['vip_count'] = $request['vipCount'];
        $data['total_price'] = $request['subtotalValue'];
        $data['payment_status_id'] = 1;

        Cart::create($data);
        return redirect('/payment');
    }

    public function tickets() {
        $tickets = Ticket::with(['user', 'ticket_name', 'checkin'])->paginate(2);
        return view('admin.index', [
            'tickets' => $tickets,
        ]);
    }

    public function checkins() {
        $checked = Ticket::with(['user', 'ticket_name'])->where('checkin_id', 1)->latest()->paginate(2, ['*'], 'checkedPage');
        $unchecked = Ticket::with(['user', 'ticket_name'])->where('checkin_id', 2)->latest()->paginate(2, ['*'], 'uncheckedPage');

        return view('admin.checkins', [
            'checked' => $checked,
            'unchecked' => $unchecked,
        ]);
    }

    public function inputbooking(Request $request) {
        $data = $request->validate([
            'booking_id' => 'required',
        ]);

        Ticket::where('booking_id', $data['booking_id'])->update(['checkin_id' => 1]);
        return back();
    }

    public function edit(Ticket $ticket) {
        return view('admin.edit', [
            'ticket' => $ticket,
            'users' => User::where('user_role_id', 1)->get(),
            'ticket_name' => TicketName::all(),
            'checkin' => CheckIn::all(),
        ]);
    }

    public function update(Request $request, Ticket $ticket) {
        $request->validate([
            'booking_id' => 'required',
            'name' => 'required',
            'ticket_name_id' => 'required',
            'checkin_id' => 'required',
        ]);
        $user_id = User::where('name', $request['name'])->first();

        $data = array(
            'booking_id' => $request['booking_id'],
            'user_id' => $user_id->id,
            'ticket_name_id' => $request['ticket_name_id'],
            'checkin_id' => $request['checkin_id'],
        );

        Ticket::where('id', $ticket->id)->update($data);
        return redirect('/admin/dashboard');
    }

    public function delete(Request $request, Ticket $ticket) {
        Ticket::destroy($ticket->id);
        return back();
    }
}
