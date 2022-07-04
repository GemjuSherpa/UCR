<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Booking;

use Illuminate\Support\Facades\Auth;

class UserAccountController extends Controller
{
    //user account controller

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:User');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bookings =  Booking::all()->where('user_id', Auth::id());
        return view('components.userAccount', ['bookings' => $bookings]);
    }

    public function update(Request $request)
    {
       $inputs = $request->all();
   
        $user = User::find($request->id);
    	
    	$user->name = $inputs['name'];
        $user->email = $inputs['email'];
        $user->address = $inputs['address'];
        
        $user->update();
    
    	return redirect()->route('user-account')->with("status", "Your details have been updated successfully!");
    }

    public function addBalance(Request $request){

        $inputs = $request -> all();
        $user = User::find($request->account);

        $userCurrentBal = User::find($request->account)->balance;
        $newBal = $inputs['deposit'] + $userCurrentBal;

        $user->balance = $newBal;
        $user->update();
        

          // Record Transaction 
        Transaction::create([
            'user_id' =>$request->account,
            'amount_added' =>$request->deposit,
            'user_name' =>$request->name,
            'payment_method' =>$request->payment,
        ]);

      
        return redirect()->route('user-account');

    }

}
