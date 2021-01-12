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
    
   

    public function edit()
    {
        
    }
    
    public function store()
    {
        //        
    }

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
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:4',
            'image' => 'required'
            ]);
            
            $admin = Admin::where('id', $id);   
            $admin->first_name = $request->first_name;
            $admin->image = $images;
            $admin->save();
            return redirect()->route('')->with('success', 'Tenant Updated Successfully');
        }    
}
