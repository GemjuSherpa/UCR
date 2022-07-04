<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Computer;

class BrowseController extends Controller
{
    //return view
    public function index()
    {
        $computers = Computer::all()->where('availability', '1');
        return view('components.browse', ['computers'=>$computers]);
    }

    //return view
    public function detail($id)
    {
        $computer = Computer::find($id);
        return view('components.computerDetail', ['computer'=>$computer]);
    }

    public function sort(Request $brand){

        
        $computers = Computer::all()->where('brand', $brand->brand);

        return view('components.browse', ['computers'=>$computers]);
    }
}
