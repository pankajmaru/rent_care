<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\User;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return view('room-list',['rooms'=>$rooms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-room');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rooms = new Room;
        $validated = $request->validate([
            'room_number' => 'required',
            'rent_amount' => 'required',
            'electricity_amount' => 'required',
            'water_amount' => 'required'
            ]);
            $rooms->room_number = $request->room_number;
            $rooms->rent_amount = $request->rent_amount;
            $rooms->electricity_amount = $request->electricity_amount;
            $rooms->water_amount = $request->water_amount;
            $rooms->save();
            return redirect()->route('room-index')->with('success', 'Room Added Successfully');
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
    public function edit(Request $request,$id)
    {
        $users = User::where('room_id', $id)->get();
        return view('edit-room',['users'=>$users]);
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
    public function destroy(Request $request, $id)
    {
        $rooms = Room::where('room_id', $id)->delete();
        return back()->withInput()->with('success', 'Room Deleted Successfully');
    }
}
