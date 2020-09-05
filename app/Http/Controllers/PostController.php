<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with(['user','category'])->orderBy('id','desc')->paginate(5);
        return view('frontend.index',compact('posts'));
    }


    public function create()
    {
        return view('frontend.create');

    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        return view('frontend.show');

    }


    public function edit($id)
    {
        return view('frontend.edit');

    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
