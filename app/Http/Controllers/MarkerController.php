<?php

namespace App\Http\Controllers;

use App\Marker;
use App\SceneMarker;
use Illuminate\Http\Request;

class MarkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Marker.index');
        
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
    
        $marker=new Marker();
        $stamp=date_timestamp_get(date_create());
        $marker->marker_name=$request->marker_name;
        $marker->file = $stamp;
        $marker->save();

        // ImageSaverController::singleFileSaverBusiness($request,$stamp);
        
        return redirect()->back()->with('info','Data saved Successfully');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marker  $marker
     * @return \Illuminate\Http\Response
     */
    public function show(Marker $marker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marker  $marker
     * @return \Illuminate\Http\Response
     */
    public function edit(Marker $marker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marker  $marker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marker $marker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marker  $marker
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marker = SceneMarker::find($id)->delete();
        if($marker){
            return redirect()->back()->with('info','Marker deleted Successfully');
        }else{
        return redirect()->back()->with('info','Unable to delete marker');
        }
    }
}
