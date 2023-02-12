<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index' , 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $media = Media::paginate(6);
        return view('media.index')->with('media' , $media);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        $photoName = $file->getClientOriginalName();
        $updatedphotoName = time() . '_' . $photoName;
        $file->move('photos' , $updatedphotoName);
        $media = new Media;
        $media->name = $updatedphotoName;
        $media->user_id = auth()->user()->id;
        $media->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = Media::findOrFail($id);
        return view('media.show')->with('photo' , $photo);
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Media::findOrFail($id);
        //check for correct user
        if(auth()->user()->id != $photo->user_id){
            return redirect('/media')->with('error' , 'Unauthorized Access');
        }
        unlink('photos/' . $photo->name);
        $photo->delete();
        return redirect('/media')->with('delete', 'Media Deleted');
    }
}
