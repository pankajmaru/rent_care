<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Http\Requests\StoreUsers;
use App\Bill;
use App\Admin;
use App\UserImage;
use App\Mail\TestMail;
use App\AdminExpenses;
use App\Room;
use PDF;
use Mail;
use snappy;


class BillsController extends Controller
{

    public function send(Request $request, $id)
    {
        $bills = ['invoice_number','electricity_unit'];
        \Mail::to('pkmaru1993@gmail.com')->send(new TestMail($bills));
        return back()->withInput()->with('success', 'Mail Send Successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Bill::query();

        if($request->has('year') && $request->year != '' ){
            $query->whereYear('invoice.created_at',$request->year);
        }
        if($request->has('month') && $request->month != '' ){            
            $query->whereMonth('invoice.created_at',$request->month);
        }
        if ($request->has('search') &&  $request->search != '')
        {
            $search_text = $request->search;
            $query->join('users', 'users.id', '=', 'invoice.user_id')
            ->join('rooms', 'rooms.room_id', '=', 'invoice.room_id')
            ->where('users.first_name', 'like', '%' . $search_text . '%')
            ->orWhere('rooms.room_number', 'like', '%' . $search_text . '%')
            ->orWhere('invoice.invoice_number', 'like', '%' . $search_text . '%');
        }

        $bills = $query->get();
        return view('bill-list',compact('bills'));
    }

    /**s
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('first_name','id');
        $rooms = Room::pluck('room_number','room_id');
        $rent = Room::pluck('rent_amount','room_id');
        return view('new-bill',['users'=>$users,'rooms'=>$rooms,'rent'=>$rent]);
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
        $rentamount = $bills->room->rent_amount;
        $toal_elce_unit = $request->electricity_unit * '9';
        $toal_water_unit = $request->water_unit * '9';
        $total_rent_amount = $rentamount + $toal_elce_unit + $toal_water_unit;
        $bills->invoice_number = $request->invoice_number;
        $bills->electricity_unit = $toal_elce_unit;
        $bills->water_unit = $toal_water_unit;
        $bills->from_date = $request->from_date;
        $bills->to_date = $request->to_date;
        $bills->net_amount = $total_rent_amount;
        $paid_amount = $request->total_paid;
        $bills->total_paid  = $paid_amount;
        $due_amount = $total_rent_amount - $paid_amount;
        $bills->total_dues = $due_amount;
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
        $validated = $request->validate([
            'user_id' => 'required',
            'room_number' => 'required',
            'invoice_number' => 'required',
            'mobile_number' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'rent_amount' => 'required',
            'electricity_unit' => 'required',
            'water_unit' => 'required'
        ]);        
        
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





}