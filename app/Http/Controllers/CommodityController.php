<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommodityController extends Controller
{
    //

    public function index()
    {
        $areaIdentifier = "Management | Commodity";
        return view('admin.management.commodity', compact('areaIdentifier'));
    }

    public function store(Request $request)
    {
        dd($request->all());

    }
}
