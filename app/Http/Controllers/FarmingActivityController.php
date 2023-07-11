<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Models\Farming_Activity;
use App\Models\FarmingActivity;
use Illuminate\Http\Request;

class FarmingActivityController extends Controller
{
    //

    public function index()
    {
        $areaIdentifier = "Management | Farming Activity";
        $farmingActivityData = FarmingActivity::showFarmingActivity();
        $commodityList = Commodity::commodityList();
        return view('admin.management.farmactivity', compact('areaIdentifier', 'commodityList', 'farmingActivityData'));
    }

    public function store(Request $request)
    {
        if (FarmingActivity::where('fa_name', '=', trim(strtoupper($request->fa_name)))->exists()) {
            return back()->with('error','Invalid! the farming activity '. trim(strtoupper($request->fa_name)) . ' was already exist!');
        } else {
            $farmingActivity = new FarmingActivity();
            $farmingActivity->fa_name = trim(strtoupper($request->fa_name));
            $farmingActivity->created_by = $request->userid;
            $farmingActivity->commodity_id = $request->commodity_id;
            $farmingActivity->save();
            return back()->with('success', 'Successfully Added Farming Activity');
        }
    }

    public function edit(Request $request)
    {

        $farmingActivity = FarmingActivity::find($request->fa_id);
        $farmingActivity->fa_name = trim(strtoupper($request->fa_name));
        $farmingActivity->created_by = $request->userid;
        $farmingActivity->commodity_id = $request->commodity_id;
        $farmingActivity->touch();
        return back()->with('edit_success', "Successfully Updated!");
    }
    public function delete(Request $request)
    {

        $farmingActivity = FarmingActivity::find($request->fa_id);
        $farmingActivity->delete();

        return back()->with('delete_success', "Successfully Deleted!");
    }
}
