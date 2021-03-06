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
use App\UserImage;

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
        $users = User::orderBy('id', 'DESC')->where('type', '=', 'tenants')->paginate(5);
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
            'image' => 'required'
        ]);
            $users->first_name = $request->first_name;
            $users->last_name = $request->last_name;
            $users->mobile_number = $request->mobile_number;
            $users->room_id = $request->room_id;
            $users->type = 'tenants';
            $users->save();

            if($request->hasFile('image')){
                
                foreach($request->image as $image)
                {
                    $userImages = new UserImage;
                    $userImages->user_id = $users->id;
                    $imageName = microtime().'.'.$image->extension();
                    $image->move(public_path('images'), $imageName);
                    $userImages->image = $imageName;
                    $userImages->save();
                }
            }
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
        $user = User::find($id);
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
        $rooms = Room::all();
        return view('edit-tenant', ['users'=>$users,'rooms'=>$rooms]);
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
            'image' => 'required'
        ]);       

        $users = User::where('id', $id);
        $users->first_name = $request->first_name;
        $users->last_name = $request->last_name;
        $users->mobile_number = $request->mobile_number;
        $users->room_id = $request->room_id;
        $users->image = $images;
        $users->save();
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

    public function search(Request $request)
    {
        $search_text = $_GET['search'];
        $searchString = trim($search_text);
        $search_results = User::where(function ($query) use($searchString) {$query->where('first_name', 'like', '%' . $searchString . '%')
            ->orWhere('last_name', 'like', '%' . $searchString . '%')
            ->orWhere('mobile_number', 'like', '%' . $searchString . '%');})->get();
            if($search_results->count() == 0)
            return view('tenant-search-list',['search_results'=>$search_results])
            ->withErrors(['no_post_result' => 'There is no result you searching for']);
        else
            return view('tenant-search-list',['search_results'=>$search_results]);
    }
}
