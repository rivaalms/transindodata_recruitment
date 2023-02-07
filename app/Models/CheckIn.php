<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function tickets() {
        return $this->hasMany(Ticket::class);
    }
}
