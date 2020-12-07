<?php

namespace App\Http\Controllers;
use DB;
use App\SceneDetail;
use App\Marker;
use App\SceneMarker;
use Illuminate\Http\Request;
use App\Support\ImageUpload;
use Auth;
class SceneDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Marker::all(['id', 'marker_name']);
        return view('SceneDetail.index', compact('items'));

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
    public function store(Request $request,ImageUpload $imageUpload)
    {
        
        if($request->scene_status == 'on'){
            $scene_status = true;
        }
        else{
            $scene_status = false;
        }

        $scene=new SceneDetail();
        $scene->scene_name=$request->scene_name;
        $scene->scene_status=$scene_status;
        $scene->qrcode=$request->qrcode;
        $scene->user_id=Auth::id();
        $scene->save();

        $index = 0;
        if($scene){
            foreach($request->marker_token as $id){     
                $sceneMarker=new SceneMarker();
                $sceneMarker->scene_id = $scene->id;
                $sceneMarker->marker_id =$id;
                $sceneMarker->image_name = $imageUpload->imageUpload($request,$index);
                $sceneMarker->save();
                $index++;       
            }
        }


        return redirect('admin')->with('info','Data saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SceneDetail  $sceneDetail
     * @return \Illuminate\Http\Response
     */
    public function show(SceneDetail $sceneDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SceneDetail  $sceneDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scene = SceneDetail::where('id',$id)->first();
        $marker = SceneMarker::where('scene_id',$id)->get();
        $selected = Marker::all(['id', 'marker_name']);
        $items = DB::select("select id,marker_name from markers where id not in (select marker_id from scene_markers where scene_id=".$id.")");
        return view('SceneDetail.edit')->with('scene',$scene)->with('markers',$marker)->with('items',$items)->with('selected',$selected);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SceneDetail  $sceneDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id,ImageUpload $imageUpload)
    {
        if($request->scene_status == 'on'){
            $scene_status = true;
        }
        else{
            $scene_status = false;
        }
        $scene= SceneDetail::where('id',$id)->first();
        $scene->scene_name=$request->scene_name;
        $scene->scene_status=$scene_status;
        $scene->qrcode=$request->qrcode;
        $scene->save();

        $index = 0;
        if($scene){
            foreach($request->marker_token as $marker_id){     
                if (SceneMarker::where('scene_id',$id)->where('marker_id',$marker_id)->first()){
                    $sceneMarker= SceneMarker::where('scene_id',$id)->where('marker_id',$marker_id)->first();
                }else{
                    $sceneMarker = new SceneMarker();
                }
                $sceneMarker->scene_id = $id;
                $sceneMarker->marker_id =$marker_id;
                if (isset($request->file('file')[$index])){
                    $sceneMarker->image_name = $imageUpload->imageUpload($request,$index);
                }else{
                    $sceneMarker->image_name = $sceneMarker->image_name; 
                }
                $sceneMarker->save();
                $index++;       
            }
        }


        return redirect('admin')->with('info','Data updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SceneDetail  $sceneDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scene = SceneDetail::find($id)->delete();
        $scene_marker = SceneMarker::where('scene_id',$id)->delete();
        return redirect('admin')->with('info','Scene Deleted Successfully');
    }
}
