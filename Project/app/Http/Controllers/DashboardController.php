<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Review;
use App\Applicant;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = auth()->user()->id;
        $user_type = auth()->user()->Type;
        if ($user_type == 1){
            $reviews = Review::orderBy('created_at','desc')->paginate(5);
            $title = "The Customer Service's Dashboard";
            return view('reviews.index')->with('reviews',$reviews)->with('title',$title);
        }
        else if ($user_type == 2){
            $user = User::find($user_id);
            $title = "The Organizer's Dashboard";
            //return view('dashboard')->with('posts',$user->posts)->with('Type',$user_type)->with('title',$title);
            $posts = Post::where('Upcomming','1') -> orderBy('date','desc')->paginate(5);
            return view('posts.index')->with('posts',$posts)->with('title',$title);
        }
        else if ($user_type == 3){
            $posts = Post::orderBy('date','desc')->get();
            $reviews = Review::orderBy('created_at','desc')->get();
            $applicants = Applicant::orderBy('event','asc')->get();
            $title = "Admin's Dashboard";
            return view('dashboard')->with('posts',$posts)->with('title',$title)->with('reviews',$reviews)->with('applicants',$applicants);;
        }
    }
}
