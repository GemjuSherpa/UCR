<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
	protected $primaryKey = 'booking_id';

    protected $fillable = [
        'deposit_amt',
        'duration',
        'price',
        'status',
        'user_id',
        'user_name',
        'computer_id',
        'computer_name',
        'return_time',
    ];

    public function computer(){
        return $this->belongsTo(Computer::class, 'computer_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id');
    }
}
