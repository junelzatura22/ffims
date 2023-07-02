<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areaIdentifier = "Management | Position";
        return view('admin.management.position', compact('areaIdentifier'));
    }


    public function fetchAll()
    {

        $position = Position::displayAll();

        $output = '';
        $counter = 1;
        if ($position->count() > 0) {
            $output .= '  <table class="table table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th>Description</th>
                <th>Rank</th> 
                <th>Date Created</th> 
                <th>Author</th> 
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($position as $rs) {
                $output .= '<tr>
                <td></td>
                <td>' . $rs->p_desc . '</td>
                <td>' . $rs->rank . '</td>
                <td>' . date('F, m Y h:i A', strtotime($rs->created_at)) . '</td>
                <td>' . $rs->author . '</td>
                <td>
                  <a href="" id="' . $rs->p_id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editPositionModal"><i class="bi-pencil-square h4"></i></a>
                  <a href="" id="' . $rs->p_id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record in the database!</h1>';
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $position = new Position();
        $position->p_desc = trim($request->p_desc);
        $position->created_by = $request->userid;
        $position->rank = $request->rank;
        $position->save();

        return response()->json([
            'status' => 200,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $position = Position::find($id);
        return response()->json($position);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $position = Position::find($request->p_id);
        $position->p_desc = $request->p_desc;
        $position->created_by = $request->userid;
        $position->rank = $request->rank;
        $position->touch(); //i want only the date updated_at to change
        return response()->json([
            'status' => 200,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function delete($id)
    // {   

    //     $emp = new Position();
    //     $emp->p_id = $id;
    //     $emp->delete();

    // }
    public function delete($id)
    {

        // $p_id = $request->id;    
        $position = Position::find($id);
        $position->delete();
    }
}
