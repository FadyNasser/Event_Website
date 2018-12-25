<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view ('pages.index');
    }

    public function about(){
        $title = 'About Us';
        return view ('pages.about')->with('title',$title);
    }

    public function reviews(){
        $title = "Review Us";
        return view ('pages.reviews')->with('title',$title);
    }

    public function contact(){
        $title = 'Contact Us';
        return view ('pages.contact')->with('title',$title);
    }

}
