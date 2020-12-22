<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreUsers;
use App\User;
use App\Room;

class UsersController extends Controller
{
    public function home()
    {
        return view('home');
    }    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->where('type', '=', 'tenants')->get();
        return view('list-tenant',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        $rooms = Room::get();
        return view('add-tenant',['rooms'=>$rooms]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = new User;
        $validated = $request->validate([
            'first_name' => 'required|min:4',
            'last_name' => 'required|min:3',
            'mobile_number' => 'required|min:10',
            'room_id' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
        ]);
            $users->first_name = $request->first_name;
            $users->last_name = $request->last_name;
            $users->mobile_number = $request->mobile_number;
            $users->room_id = $request->room_id;
            $users->from_date = $request->from_date;
            $users->to_date = $request->to_date;
            $users->type = 'tenants';
            $users->save();
            return redirect()->route('tenant-index')->with('success', 'Tenant Add Successfully');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user= User::find($id);
        return view('view-tenant',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $users = User::find($id);        
        return view('edit-tenant', ['users'=>$users]);
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
            'first_name' => 'required|min:4',
            'last_name' => 'required|min:3',
            'mobile_number' => 'required|min:10',
            'room_id' => 'required',
            'from_date' => 'required',
            'to_date' => 'required'
        ]);        
        $users = User::where('id', $id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile_number' => $request->mobile_number,
            'room_id' => $request->room_id,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date
            ]);
            return redirect()->route('tenant-index')->with('success', 'Tenant Updated Successfully');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $users = User::where('id', $id)->delete();
        return back()->withInput()->with('success', 'Tenant Deleted Successfully');
    }
}