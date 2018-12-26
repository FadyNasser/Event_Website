<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Applicant;
use DB;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=> ['index','show','apply']]);
    }

    public function index()
    {
        $posts = Post::where('Upcomming','1') -> orderBy('date','desc')->paginate(5);
        $title = "Upcomming Events";
        return view('posts.index')->with('posts',$posts)->with('title',$title);
    }

    public function create()
    {
        if(auth()->user()->Type == 1){
            return redirect('/posts')->with('error','Unauthorized Page');
        }
        return view('posts.create');
    }

    public function store(Request $request)
    {
        if(auth()->user()->Type == 1){
            return redirect('/posts')->with('error','Unauthorized Page');
        }
        $this->validate($request,[
            'title' => ['required', 'string', 'max:100'],
            'date' => ['required', 'date'],
            'body' => ['required', 'string', 'max:255'],
        ]);
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->date = $request->input('date');

        if((time()-(60*60*24)) < strtotime($request->input('date'))){
            $post->Upcomming = 1;
        }
        else {
            $post->Upcomming = 0;
        }

        $post->user_id = auth()->user()->id;
        $post->save();
        return redirect('/posts')->with('success','Post Created Successfully');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    public function edit($id)
    {
        if(auth()->user()->Type == 1){
            return redirect('/posts')->with('error','Unauthorized Page');
        }
        $post = Post::find($id);
        return view('posts.edit')->with('post',$post);
    }

    public function update(Request $request, $id)
    {
        if(auth()->user()->Type == 1){
            return redirect('/posts')->with('error','Unauthorized Page');
        }

        $this->validate($request,[
            'title' => ['required', 'string', 'max:100'],
            'date' => ['required', 'date'],
            'body' => ['required', 'string', 'max:255'],
        ]);

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->date = $request->input('date');

        if((time()-(60*60*24)) < strtotime($request->input('date'))){
            $post->Upcomming = 1;
        }
        else {
            $post->Upcomming = 0;
        }
        $post->user_id = auth()->user()->id;
        $post->save();
        return redirect('/posts')->with('success','Post Updated Successfully');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if(auth()->user()->Type !== 3 ){
            return redirect('/posts')->with('error','Unauthorized Page');
        }
        $post->delete();
        return redirect('/posts')->with('success','Post Deleted Successfully');
    }
}

