<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;
    
	protected $table = 'computers';
	protected $primaryKey = 'computer_id';

    protected $fillable = [
        'name',
        'brand',
        'description',
        'price_rate',
        'file_path',
        'display_size',
        'os',
        'ram',
        'usb_port',
        'hdmi_port',
        'availability',
    ];
    
}

