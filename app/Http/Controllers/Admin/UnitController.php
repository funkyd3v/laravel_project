<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function addUnit(){
        return view('admin.unit.add-unit');
    }
    public function newUnit(Request $request){
        Unit::newUnit($request);
        return redirect()->back()->with('message', 'Unit added!');
    }
}
