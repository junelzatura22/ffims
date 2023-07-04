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

    public function edit(Request $request){
          //
          $designation = Designation::find($request->d_id);
          $designation->d_abr = trim(strtoupper($request->d_abr));
          $designation->d_description = trim(mb_strtoupper($request->d_description));
          $designation->created_by = $request->created_by;
          $designation->touch();
          //
          return back()->with('success',"Successfully Update Designation");
        
    }
    public function delete(Request $request){
          //
          $designation = Designation::find($request->d_id);
          $designation->delete();
          //
          return back()->with('success',"Successfully Deleted");
        
    }
}
