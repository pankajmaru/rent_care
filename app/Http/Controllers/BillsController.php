<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Room;
use App\Bill;

class BillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Bill::all();
        $users = User::all();
        $rooms = Room::all();
        return view('bill-list',['bills'=>$bills,'users'=>$users,'rooms'=>$rooms]);
    }

    /**s
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        $rooms = Room::get();
        return view('new-bill',['users'=>$users,'rooms'=>$rooms]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {           
        $validated = $request->validate([
            'user_id' => 'required',
            'room_number' => 'required',
            'invoice_number' => 'required|min:3',
            'mobile_number' => 'required|max:10',
            'from_date' => 'required',
            'to_date' => 'required',
            'rent_amount' => 'required',
            'electricity_unit' => 'required',
            'water_unit' => 'required',
            ]);
        $bills = new Bill;        
        $bills->user_id = $request->user_id;
        $bills->room_id = $request->room_number;
        $bills->invoice_number = $request->invoice_number;
        $bills->electricity_unit = $request->electricity_unit;
        $bills->water_unit = $request->water_unit;
        $bills->from_date = $request->from_date;
        $bills->to_date = $request->to_date;
        $bills->save();
        return redirect()->route('bill-index')->with('success', 'Bill Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bills = Bill::find($id);
        return view('bill-view',['bills'=>$bills]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bills = Bill::find($id);
        $users = User::all();
        $rooms = Room::all();
        return view('bill-edit',['bills'=>$bills,'users'=>$users,'rooms'=>$rooms]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
