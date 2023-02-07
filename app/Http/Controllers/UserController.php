<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function auth(Request $request) {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            $user = User::where('email', $request['email'])->first();
            if ($user->user_role_id == 1) {
                return redirect()->intended('/');
            } else {
                return redirect()->intended('/admin/dashboard');
            }
        }
        return back();
    }

    public function register(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ]);

        $data['user_role_id'] = 1;
        $data['password'] = bcrypt($data['password']);

        // dd($data);
        User::create($data);

        return redirect('/login');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function mytickets() {
        $tickets = Ticket::with(['user', 'checkin', 'ticket_name'])->where('user_id', auth()->user()->id)->get();
        return view('mytickets', [
            'tickets' => $tickets,
        ]);
    }
}
