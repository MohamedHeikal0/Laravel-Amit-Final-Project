<?php

namespace App\Http\Controllers;

use App\photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $all = photo :: all();
        $count = photo :: count();
        return view('photo.index', compact('all', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'image' => 'mimes:jpg, jpeg, png, JPEG'
        ]);
        $image = $request -> image;

        $file = $request -> file('image');

        if($file){
            $finalname = uniqid() . $file -> getClientOriginalName();
            $file -> move('images',$finalname);
            $input['image'] = $finalname ;
        }

        photo :: create($input);
        return redirect('photo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $single = photo::where('id', $id)->get(); 
        return view('photo.single' , compact('single'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $single = photo::where('id', $id)->get(); 
        return view('photo.edit' , compact('single'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $photo = photo:: findOrfail($id);

        $request -> validate([
            'image' => 'mimes:jpg, jpeg, png, JPEG'
        ]);
        $image = $request -> image;

        $file = $request -> file('image');

        if($file){
            $finalname = uniqid() . $file -> getClientOriginalName();
            $file -> move('images',$finalname);
            $input['image'] = $finalname ;
        }else{
            $input['image'] = $photo ->image ;
        }

        $photo->update($input);
        return redirect('photo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = photo :: findOrfail($id) ->delete();
        return redirect('photo');
    }
}
