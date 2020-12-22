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
        $bills = Bill::get();
        $users = User::get();
        $rooms = Room::get();
        return view('bill-list',['bills'=>$bills,'users'=>$users,'rooms'=>$rooms]);
    }

    /**
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
        
        // $validated = $request->validate([
            //     'name' => 'required',
            //     'room_number' => 'required',
            //     'bill_number' => 'required',
            //     'mobile_number' => 'required',
            //     'from_date' => 'required',
            //     'to_date' => 'required',
            //     'rent_amount' => 'required',
            //     'electricity_unit' => 'required',
            //     'water_unit' => 'required'
            // ]);
        $bills = new Bill;
        $bills->bill_number = $request->bill_number;
        $bills->electricity_unit = $request->electricity_unit;
        $bills->water_unit = $request->water_unit;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
