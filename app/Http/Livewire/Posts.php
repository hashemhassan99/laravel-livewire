<?php

namespace App\Http\Livewire;

use App\Post;
use Livewire\Component;
use Livewire\WithPagination;


class Posts extends Component
{
    use WithPagination;

    public function render()
    {
        $posts = Post::with(['user', 'category'])->orderBy('id', 'desc')->paginate(5);

        return view('livewire.posts', [
            'posts' => $posts
        ]);
    }

    public function create_post()
    {
        return redirect()->to('/livewire/posts/create');
    }

    public function show_post($id)
    {

    }

    public function edit_post($id)
    {

    }

    public function delete_post($id)
    {

    }
}
