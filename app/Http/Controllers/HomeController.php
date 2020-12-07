<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SceneDetail;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   $user_id = Auth::user()->id;
        $scene = SceneDetail::where('user_id',$user_id)->get();
        return view('Account.index')->with('scenes',$scene);
    }


    public function logout () {
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect('/admin');
    }
}
