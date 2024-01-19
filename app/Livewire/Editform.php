<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class Editform extends Component
{
    public $articleid;
    
    public $name;
    public $description;
    public $price;
    
    
    public function mount(){
        $article = Article::find($this->articleid);


        $this->name = $article->name;
        $this->description = $article->description;
        $this->price = $article->price;
    }


    public function edit(){
        $article = Article::find($this->articleid);

        $article->udate([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
        ]);

        return redirect(route('welcome'));
    }
    
    
    public function render()
    {
        return view('livewire.editform');
    }
}
