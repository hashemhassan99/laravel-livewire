<?php

namespace App\Http\Livewire;

use App\Category;
use App\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPost extends Component
{
    use WithFileUploads;

    public $post_id;
    public $post;
    public $title;
    public $category;
    public $image;
    public $body;
    public $image_original;

    //this function to show the data from data base when iam open the edit view
    public function mount()
    {
        $this->post_id = request()->post_id;
        $this->post = Post::whereId($this->post_id)->whereUserId(auth()->id())->first();
        $this->title = $this->post->title;
        $this->body = $this->post->body;
        $this->category = $this->post->category_id;
        $this->image = $this->post->image;
        $this->image_original = $this->post->image;
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.edit-post', [
            'categories' => $categories,
            'post' => $this->post
        ]);
    }

    public function update($id)
    {
        $this->validate([
            'title' => 'required',
            'category' => 'required',
            'body' => 'required',
            'image' => 'required|mimes:jpg,jpeg,gif,png|max:20000'
        ]);

        $post = Post::whereId($this->post_id)->whereUserId(auth()->id())->first();
        if ($post) {
            $data['title'] = $this->title;
            $data['category_id'] = $this->category;
            $data['body'] = $this->body;

            if ($image = $this->image) {
                if (File::exists('assets/images/' . $this->image)) {
                    unlink('assets/images/' . $this->image);
                }

                $filename = Str::slug($this->title) . '.' . $image->getClientOriginalExtension();
                $path = public_path('/assets/images/' . $filename);
                Image::make($image->getRealPath())->save($path, 100);

                $data['image'] = $filename;
            }
            $post->update($data);
            $this->resetInput();
            session()->flash('message', 'Post Updated Successfully');
            return redirect()->to('livewire/posts');
        }
        session()->flash('message_error', 'Some Thing Wrong');
        return redirect()->to('livewire/posts');


    }

    private function resetInput()
    {
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
