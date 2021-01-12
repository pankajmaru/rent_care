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
use App\User;
use App\Room;
use App\Admin;
use App\UserImage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Admin::get();
        return view('admin-profile',['results'=>$results]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $profile = Admin::find($id);
        return view('edit-profile',['profile'=>$profile]);
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
        // 'name' => 'required|min:4',
        // 'image' => 'required'
        // ]);
        $admin = Admin::where('id', $id)->first();
        $admin->name = $request->name;
        $admin->admin_image = $request->image;
        $admin->save();

        if($request->hasFile('image')){

            $img = $request->file('image');
            $adminImage = new Admin;
            $adminImage->image = $admin->id;
            $imageName = microtime().'.'.$img->extension();
            $img->move(public_path('images'), $imageName);
            $adminImage->image = $imageName;
            $userImages->save();
        }
        return redirect()->route('admin-profile-index')->with('success', 'Profile Updated Successfully');
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
