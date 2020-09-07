<?php

namespace App\Http\Livewire\Dynamic;

use App\Category;
use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.dynamic.create',[
            'categories' => $categories
        ]);
    }

    public function save(){

    }
}
