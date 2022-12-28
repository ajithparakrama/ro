<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('points.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $request->validate(
            ['event'=>'required|min:2|max:255',
            'event_date'=>'required|date',
            'file'=>'required|mimes:jpg,jpeg,JPG,JPEG|max:2048']
        );

        
        $event = point::create([
            'event'=>$request->event,
            'event_date'=>$request->event_date,
            'user_id'=>Auth::user()->id
        ]);

        if($request->file('file')){
            $destinationPath = public_path('uploads/'.$event->id.'/');    
            if(!File::isDirectory($destinationPath)){
              File::makeDirectory($destinationPath, 0777, true, true);    
              }
              $fileModel = new File;
                $ext =  $request->file('file')->extension();
                $fileName = time().'.'.$ext;
                $request->file('file')->move($destinationPath,$fileName); 
              $event->update(['file'=>'uploads/'.$event->id.'/'.$fileName]);
              return redirect()->route('points.index',$event->id)->with('message','Success'); 
        }    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function show(Point $point)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function edit(Point $point)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Point $point)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function destroy(Point $point)
    {
        //
    }
}
