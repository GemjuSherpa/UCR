<?php

namespace App\Http\Controllers\Computer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Computer;

class MasterComputerController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        // $this->middleware('role:Staff') || $this->middleware('role:Admin');
        
    }

    //master computer return view with listing all available computer
    public function index(){
        $computers = Computer::all();
        return view('computer.master_computer', ['computers'=>$computers]);
    }


    // Display add computer form
    public function add(){
        return view('computer.add_computer');
    }

    // add new computer
    public function store(Request $request){
        $this->validate($request, [
            'name'=>'required',
            'brand'=>'required',
            'description'=>'required',
            'rate'=>'required',
            'computerImage'=>'required',
            'display_size'=>'required',
            'os'=>'required',
            'ram'=>'required',
            'usb_port'=>'required',
            'hdmi_port'=>'required',
        ]);

        if($request->hasFile('computerImage')){
            $file = $request->file('computerImage');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('img'), $filename);
        }

        // Create new computer
        Computer::create([
            'name' =>$request->name,
            'brand' =>$request->brand,
            'description' =>$request->description,
            'price_rate' =>$request->rate,
            'file_path' =>$filename,
            'display_size' =>$request->display_size,
            'os' =>$request->os,
            'ram' =>$request->ram,
            'usb_port' =>$request->usb_port,
            'hdmi_port' =>$request->hdmi_port,
            'availability'=>$request->availability,
        ]);
    
        
    	return redirect()->route('computer')->with("status", "New Computer created successfully!");

    }

    // update Computer details
	public function update(Request $request){

        $inputs = $request->all();
        $computer = Computer::find($request->computer_id);
        
        if($request->hasFile('computerImage')){
            $file = $request->file('computerImage');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file -> move(public_path('img'), $filename);
            $computer->file_path = $filename;
        }
    	
    	$computer->name = $inputs['name'];
        $computer->brand = $inputs['brand'];
        $computer->description = $inputs['description'];
        $computer->price_rate = $inputs['rate'];
        $computer->display_size = $inputs['display_size'];
        $computer->usb_port = $inputs['usb_port'];
        $computer->os = $inputs['os'];
        $computer->ram = $inputs['ram'];
        $computer->hdmi_port = $inputs['hdmi_port'];
        $computer->availability = $inputs['availability'];
        $computer->update();
    
    	return redirect()->route('computer')->with("status", "Computer details updated successfully!");
    }

    // TODO:: it does not update db ??
    // delete the computer
	public function destroy(Request $id){
        $res = Computer::where('id',$id)->delete();
    	return back()->with('status', 'Computer successfully deleted');
	}
}
