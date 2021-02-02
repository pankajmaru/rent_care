<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
use App\UserImage;
use App\AdminExpenses;

class AdminController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id) {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        //

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(){

        $images = Admin::first();
        return view('admin.admin-profile',['images'=>$images]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id){

        $profile = Admin::find($id);
        return view('admin.edit-admin-profile',['profile'=>$profile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id) {

        $validated=$request->validate([
            'name' => 'required',
            'image' => 'required'
            ]);
            $admin = Admin::where('id', $id)->first();
            $admin->name=$request->name;
            $admin->admin_image=$request->image;

            if ($request->hasFile('image')){
            $files = $request->file('image');
            $upload_path = public_path('images/');
            $filename = $files->getClientOriginalName();
            $extension = $files->getClientOriginalExtension();
            $fileName = microtime().".".$extension;
            $files->move($upload_path, $fileName);
            \File::copy($upload_path.$fileName,public_path('dist/img/').$fileName);
            $admin->admin_image = $fileName;
        }

        $admin->save();
        return redirect()->route('admin-profile')->with('success','Profile Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
