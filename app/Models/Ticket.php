<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded = ['id'];

    use HasFactory;

    public function ticket_name() {
        return $this->belongsTo(TicketName::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function checkin() {
        return $this->belongsTo(CheckIn::class);
    }
}
