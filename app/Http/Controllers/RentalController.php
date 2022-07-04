<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

use App\Models\Computer;
use App\Models\Booking;

class RentalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $computer = Computer::find($id);
        return view('components.rental', ['computer'=>$computer]);
    }

    public function summary($id, Request $request){
            $booking = $request->all();
           
            $computer = Computer::find($id);

            $duraion = 0;
            $deposit = 50;

            $currentDate = date('d-m-Y H:m');
            $currentDate = date('d-m-Y H:m', strtotime($currentDate));   
            $startDate = date('d-m-Y H:m', strtotime("$request->timeFrom"));
            $endDate = date('d-m-Y H:m', strtotime("$request->timeTo"));   

            if (($currentDate >= $startDate) && ($startDate <= $endDate)){   
                $startTime = Carbon::parse($startDate);
                $endTime = Carbon::parse($endDate);

                // convert time to hr
                $totalDuration =  $startTime->diff($endTime)->format('%H:%I:%S');
                $d = explode(':', $totalDuration);
                $hr = ($d[0]) + ($d[1] / 60) + $d[2]/3600;
        
                // booking time must be greater that 1 and must not exceed 5 hours
                if($hr > 5 && $hr >= 1){
                    return Redirect::back()->withErrors('msg', "Total rental time must not exceed 5 hours");
                }
                else{

                    $totalPrice = ($request->price_rate * $hr) + $deposit ;
                    $form_data = [
                        'duration'=> $hr,
                        'deposit'=> '50',
                        'total_price'=> $totalPrice,
                        'start_date'=>$startDate,
                        'end_date' => $endDate
                    ];

                    return view('components.bookingSummary', compact('form_data','computer'));
                }
                
            }else{    
                return Redirect::back()->withErrors('msg', "Start date must be greater than current and less than end date. ");
            }

            
    }

    public function create(Request $request){
       
        $booking_summary = $request->all();
       
        
        if(($request->bookingPrice > $request->availableBalance)){
            return redirect()->route('user-account');
        }

        // create booking
        Booking::create([
            'user_id' =>$request->user_id,
            'computer_id' =>$request->computer_id,
            'user_name' =>$request->fullName,
            'duration' =>$request->duration,
            'price' =>$request->bookingPrice,
            'return_time' =>$request->end_date,
            'computer_name' =>$request->computer_name,
            'deposit_amt' =>$request->deposit,
            'status' => "rented",
        ]);

        // Change the availability of computer
        $computer = Computer::find($request->computer_id);
        $computer->availability = 0;
        $computer->update();

        return redirect()->route('user-account');
        
    }

    // rental history
    public function rental(){
        return view('components.bookingHistory');
    }

    // manage rental
    
}
