<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function __construct()
    {$this->middleware('auth')->except('create.article', 'edit.article');
        
    }
    public function create(){


        return view('article.create');
    }

    public function edit(Article $article){

        return view('article.edit' , compact('article'));

    }
}
