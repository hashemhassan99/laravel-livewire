<?php

namespace App\Http\Livewire;

use App\Category;
use App\Post;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    public $title;
    public $category;
    public $image;
    public $body;

    public function render()
    {
        $categories = Category::all();

        return view('livewire.create-post', [
            'categories' => $categories
        ]);
    }

    public function save()
    {
        $this->validate([
            'title' => 'required',
            'category' => 'required',
            'body' => 'required',
            'image' => 'required|mimes:jpg,jpeg,gif,png|max:20000'
        ]);
        $data['user_id'] = auth()->id();
        $data['title'] = $this->title;
        $data['body'] = $this->body;
        $data['category_id'] = $this->category;

        if ($image = $this->image) {
            $filename = Str::slug($this->title) . '.' . $image->getClientOriginalExtension();
            $path = public_path('/assets/images/' . $filename);
            Image::make($image->getRealPath())->save($path, 100);

            $data['image'] = $filename;
        }
        Post::create($data);
        $this->resetInput();
        session()->flash('message','Post Created Successfully');
        return redirect()->to('/livewire/posts');


    }
    private function resetInput(){
        $this->title = null;
        $this->body = null;
        $this->category = null;
        $this->image = null;
    }

    public function return_to_posts()
    {
        return redirect()->to('/livewire/posts');
    }
}
