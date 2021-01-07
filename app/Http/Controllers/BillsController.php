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
        return view('bill-list',['bills'=>$bills]);
    }

    /**s
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('first_name','id');        
        $rooms = Room::pluck('room_number', 'room_id');
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
        //     'user_id' => 'required',
        //     'room_number' => 'required',
        //     'invoice_number' => 'required|min:3',
        //     'mobile_number' => 'required|max:10',
        //     'from_date' => 'required',
        //     'to_date' => 'required',
        //     'rent_amount' => 'required',
        //     'electricity_unit' => 'required',
        //     'water_unit' => 'required',
        //     ]);
        $bills = new Bill;        
        $bills->user_id = $request->user_id;
        $bills->room_id = $request->room_number;
        $bills->invoice_number = $request->invoice_number;
        $bills->electricity_unit = $request->electricity_unit;
        $bills->water_unit = $request->water_unit;
        $bills->from_date = $request->from_date;
        $bills->to_date = $request->to_date;
        $bills->type = 'tenants';
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
        // $validated = $request->validate([
        //     'user_id' => 'required',
        //     'room_number' => 'required',
        //     'invoice_number' => 'required',
        //     'mobile_number' => 'required',
        //     'from_date' => 'required',
        //     'to_date' => 'required',
        //     'rent_amount' => 'required',
        //     'electricity_unit' => 'required',
        //     'water_unit' => 'required'
        // ]);        
        $bills = Bill::where('id', $id)->update([
            'user_id' => $request->user_id,
            'room_id' => $request->room_id,
            'invoice_number' => $request->invoice_number,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'electricity_unit' => $request->electricity_unit,
            'water_unit' => $request->water_unit,
           ]);
            return redirect()->route('bill-index')->with('success', 'Bill Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $bills = Bill::where('id', $id)->delete();
        return back()->withInput()->with('success', 'Bills Deleted Successfully');
    }    

    public function search(Request $request)
    {
        $search_text = $request;
        $searchString = trim($search_text);
        $search_results = Bill::where(function ($query) use($search_text) {$query->where('invoice_number', 'like', '%' . $search_text . '%');})->get();
        return view('bill-search-list',['search_results'=>$search_results]);
    }    
}