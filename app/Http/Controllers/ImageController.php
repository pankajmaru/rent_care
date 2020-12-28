<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\StoreUsers;
use App\User;
use App\Room;
use App\Image;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $images = Image::all();
        // return view('list-tenant',['images'=>$images]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-tenant-image');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $images = new Image;
        $images->title = $request->title;

        $images->image = $imageName;
        $images->save();
        return back()->with('success','You have successfully upload image.')->with('image',$imageName);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $path = storage_public('images/' . $filename);  

        // if (!File::exists($path)) {
    
        //     abort(404);
    
        // }
    
      
    
        // $file = File::get($path);
    
        // $type = File::mimeType($path);
    
      
    
        // $response = Response::make($file, 200);
    
        // $response->header("Content-Type", $type);
    
     
    
        // return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        // $data = Image::find($id);
        // print_r($data) ; die ;
        // $image_path = public_path('images').'/'.$data->filename;
        // unlink($image_path);
        // $data->delete();
        // if(Storage::delete($data->filename)) {
        //     $data->delete();
        //  }
        // return redirect('/avatars');
    }

    public function upload(Request $request)
    {
        
    }
}
