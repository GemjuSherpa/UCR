<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Computer;
use App\Models\Booking;


class AdminController extends Controller
{
   public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }
    //master computer return view
    public function index(){

        $users = User::all();
        $computers = Computer::all();
        $bookings = Booking::all();


        return view('admin.dashboard', compact('users','computers', 'bookings'));
    }
}
