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
    public function index(Request $request)
    {
        $query = Room::query();

        if ($request->has('search') &&  $request->search != '')
        {
            $search_text = $request->search;
            $query->where('rooms.rent_amount', 'like', '%' . $search_text . '%')
            ->orWhere('rooms.room_number', 'like', '%' . $search_text . '%');
        }

        $rooms = $query->orderBy('room_id', 'DESC')->paginate(5);
        return view('rooms.room-list',['rooms'=>$rooms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.room-create');
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
            'rent_amount' => 'required'
            ]);
            $rooms->room_number = $request->room_number;
            $rooms->rent_amount = $request->rent_amount;
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
    public function edit(Request $request, $id)
    {
        $room = Room::where('room_id', $id)->first();
        return view('rooms.room-edit',['room'=>$room]);
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
        $validated = $request->validate([
            'room_number' => 'required',
            'rent_amount' => 'required'
        ]);
        $rooms = Room::where('room_id', $id)->update([
            'room_number' => $request->room_number,
            'rent_amount' => $request->rent_amount,
           ]);
            return redirect()->route('room-index')->with('success', 'Room Updated Successfully');
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

    public function search()
    {
        $search_text = $_GET['search'];
        $search_results = Room::where(function ($query) use($search_text) {$query->where('room_number', 'like', '%' . $search_text . '%')->orWhere('rent_amount', 'like', '%' . $search_text . '%');})->get();                
        return view('rooms.room-search-list',['search_results'=>$search_results]);
    }
}
