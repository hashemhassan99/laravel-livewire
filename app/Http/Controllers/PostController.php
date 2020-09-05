<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::with(['user','category'])->orderBy('id','desc')->paginate(5);
        return view('frontend.index',compact('posts'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('frontend.create',compact('categories'));

    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'category' => 'required',
            'body' => 'required',
            'image' => 'required|mimes:jpg,jpeg,gif,png|max:20000'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
       $data['title'] = $request->title;
        $data['category_id'] = $request->category;
        $data['body'] = $request->body;
        $data['user_id'] = auth()->id();

        if ($image = $request->file('image')) {
            $filename = Str::slug($request->title).'.'.$image->getClientOriginalExtension();
            $path = public_path('/assets/images/'.$filename);
            Image::make($image->getRealPath())->save($path, 100);

            $data['image'] = $filename;
        }
        Post::create($data);
        return redirect()->route('posts.index')->with([
            'message' => 'Post Created Successfully',
            'alert-type' => 'success'
        ]);

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
