<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\StoreUsers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\View;
use App\User;
use App\Room;
use App\Admin;
use App\landlord;
use App\UserImage;


class LandlordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exp_lists = landlord::all();
        return view('landlord.landlord-expenses-list',['exp_lists'=>$exp_lists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('landlord.create-landlord-expenses');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $landlord_expenses = new landlord;
        $validated = $request->validate([
            'month' => 'required',
            'total_electricity_bill' => 'required',
            'total_water_bill' => 'required',
            'maintenance' => 'required',
        ]);
        
        $landlord_expenses->month = $request->month;
        $landlord_expenses->total_electricity_bill = $request->total_electricity_bill;
        $landlord_expenses->total_water_bill = $request->total_water_bill;
        $landlord_expenses->maintenance = $request->maintenance;
        $landlord_expenses->save();
        return redirect()->route('index-landlord-expenses')->with('success', 'Expenses Added Successfully');
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
        $landlords = landlord::find($id);
        return view('landlord.edit-landlord-expenses',['landlords'=>$landlords]);
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
            'month' => 'required',
            'total_electricity_bill' => 'required',
            'total_water_bill' => 'required',
            'maintenance' => 'required',
        ]);

        $landlord_expenses = Landlord::where('id', $id)->first();
        $landlord_expenses->month = $request->month;
        $landlord_expenses->total_electricity_bill = $request->total_electricity_bill;
        $landlord_expenses->total_water_bill = $request->total_water_bill;
        $landlord_expenses->maintenance = $request->maintenance;
        $landlord_expenses->save();
        return redirect()->route('index-landlord-expenses')->with('success', 'Expenses Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $landlords = landlord::where('id', $id)->delete();
        return redirect()->route('index-landlord-expenses')->with('success','Expenses Deleted Successfully');
    }
}
