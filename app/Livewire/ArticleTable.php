<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticleTable extends Component
{
    public function render()
    {

        $article = Article::all();


        return view('livewire.article-table', compact('article'));
    }


    public function delete( Article $article){

        $article->delete();

    }
}
