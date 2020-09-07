<?php

namespace App\Http\Livewire\Dynamic;

use App\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;
    public $showCreateForm = false;

    public function render()
    {
        $posts = Post::with(['user', 'category'])->orderBy('id', 'desc')->paginate(5);
        return view('livewire.dynamic.posts', [
            'posts' => $posts
        ]);
    }

    public function create_post()
    {
        $this->showCreateForm = !$this->showCreateForm;
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
