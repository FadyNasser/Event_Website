<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Applicant;
use DB;

class ApplicantsController extends Controller
{

    public function index()
    {
        $title = "Apply Now";
        return view ('apply');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100'],
            'number' => ['required','regex:/(01)[0-9]{9}/'],
            'event' => ['required','int']
        ]);

        $applicant = new Applicant;
        $applicant->name = $request->input('name');
        $applicant->email = $request->input('email');
        $applicant->number = $request->input('number');
        $applicant->event = $request->input('event');
        $applicant->save();
        return redirect('/posts')->with('success','Successfully Applied fot the event');
    }
}
