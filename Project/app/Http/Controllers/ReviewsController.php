<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use DB;

class ReviewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=> ['index','show','create','store']]);
    }
    
    public function index()
    {
        $reviews = Review::orderBy('created_at','desc')->paginate(5);
        $title = "Customer's reviews";
        return view('reviews.index')->with('reviews',$reviews)->with('title',$title);;
    }

    public function create()
    {
        return view('reviews.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => ['required', 'string', 'max:100'],
            'name' => ['nullable','string', 'max:100'],
            'description' => ['nullable','string'],
            'rating' => ['required','int','max:10']
        ]);
        $review = new Review;
        $review->title = $request->input('title');
        $review->name = $request->input('name');
        $review->description = $request->input('description');
        $review->rating = $request->input('rating');
        $review->save();
        return redirect('/reviews')->with('success','Review added Successfully');
    }

    public function show($id)
    {
        $review = Review::find($id);
        return view('reviews.show')->with('review',$review);
    }

    public function edit($id)
    {
        $review = Review::find($id);
        if(auth()->user()->Type == 2){
            return redirect('/reviews')->with('error','Unauthorized Page');
        }
        return view('reviews.edit')->with('review',$review);
    }

    public function update(Request $request, $id)
    {
        if(auth()->user()->Type == 2){
            return redirect('/reviews')->with('error','Unauthorized Page');
        }
        $this->validate($request,[
            'title' => ['required', 'string', 'max:100'],
            'name' => ['nullable','string', 'max:100'],
            'description' => ['nullable','string'],
            'rating' => ['required','int','max:10']
        ]);
        $review = Review::find($id);
        $review->title = $request->input('title');
        $review->name = $request->input('name');
        $review->description = $request->input('description');
        $review->rating = $request->input('rating');
        $review->save();
        return redirect('/reviews')->with('success','Review updated Successfully');
    }

    public function destroy($id)
    {
        $review = Review::find($id);
        if(auth()->user()->Type != 3){
            return redirect('/reviews')->with('error','Unauthorized Page');
        }
        $review->delete();
        return redirect('/reviews')->with('success','Review Deleted Successfully');
    }
}
