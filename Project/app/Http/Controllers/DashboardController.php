<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user_type = auth()->user()->Type;
        if ($user_type != 3){
            $user = User::find($user_id);
            return view('dashboard')->with('posts',$user->posts)->with('Type',$user_type);
        }
        else {
            $posts = Post::orderBy('date','desc')->paginate(10);
            return view('dashboard')->with('posts',$posts)->with('Type',$user_type);
        }
    }
}
