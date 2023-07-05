<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use Illuminate\Http\Request;

class CommodityController extends Controller
{
    //

    public function index()
    {
        $areaIdentifier = "Management | Commodity/Program";
        $commodityList = Commodity::showCommodityList();
        return view('admin.management.commodity', compact('areaIdentifier','commodityList'));
    }

    public function store(Request $request)
    {
       
        $commodity = new Commodity();
        $commodity->com_name =  trim(strtoupper($request->commodity));
        $commodity->created_by =  $request->userid;
        $commodity->save();

        return back()->with('success', " Program/Commodity was added!");

    }
    public function edit(Request $request)
    {
       
        $commodity = Commodity::find($request->com_id);
        $commodity->com_name =  trim(strtoupper($request->commodity));
        $commodity->created_by =  $request->userid;
        $commodity->touch();

        return back()->with('success', " Program/Commodity was Updated!");

    }
    public function delete(Request $request)
    {
       
        $commodity = Commodity::find($request->com_id);
        $commodity->delete();

        return back()->with('success', " Program/Commodity was deleted!");

    }
}
