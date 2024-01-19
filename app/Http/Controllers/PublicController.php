<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    function welcome() {

        $article = Article::where('is_accepted', true )->orderBy('created_at','desc')->take(4)->get();
        
        return view('welcome',compact('article'));
    }

    public function categoryShow (Category $category){
        return view('categoryShow', compact('category'));
    }

    public function showArticle(Article $article){
        return view('showArticle',compact('article'));
    }

    public function index (){

        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(6);
        return view('article.annunci',compact('articles'));
    }

    public function searchAnnouncements(Request $request){

        $articles = Article::search($request->searched)->where('is_accepted', true)->paginate(10);
        $articles->appends(['searched'=> $request->searched]);

        return view('article.annunci', compact('articles'));

    }
public function setLanguage($lang){
    session()->put('locale', $lang);

    return redirect()->back();
}






}
