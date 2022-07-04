<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
	protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'amount_deducted',
        'amount_added',
        'user_name',
        'payment_method'
    ];
}
