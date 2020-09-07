<?php

namespace App\Http\Livewire\Dynamic;

use App\Category;
use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.dynamic.edit',[
            'categories' => $categories
        ]);
    }

    public function update(){

    }
}
