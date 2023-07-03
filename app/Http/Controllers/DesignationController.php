<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{

    //
    public function index()
    {
        $allDesignation = Designation::displayAll();
        $areaIdentifier = "Management | Designation";
        return view('admin.management.designation', compact('areaIdentifier','allDesignation'));
    }

    public function store(Request $request)
    {
        //
        $designation = new Designation();
        $designation->d_abr = trim(strtoupper($request->d_abr));
        $designation->d_description = trim(mb_strtoupper($request->d_description));
        $designation->created_by = $request->created_by;
        $designation->save();
        //
        return back()->with('success',"Successfully Added Designation");
    }

    public function edit($id){
        $designation = Designation::find($id);
        
    }
}
