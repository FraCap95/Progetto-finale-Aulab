<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index(){
        $article_edit = Article::whereNotNull('is_accepted', null)->latest()->first();
        $article_to_check = Article::where('is_accepted', null)->first();
        return view('revisor.index', compact('article_to_check', 'article_edit'));

        // return view('revisor.index', compact('article_to_check'));
    }


    public function acceptArticle(Article $article){

        $article->setAccepted(true);
        return redirect()->back()->with('message', 'Complimenti, hai accettato l\'annuncio');
    }

    public function rejectArticle (Article $article){
        $article->setAccepted(false);
        return redirect()->back()->with('message', 'Complimenti, hai rifiutato l\'annuncio');
    }


    public function becomeRevisor()
    {
        // return redirect('/')->with('message', 'You shall not pass!');
        return view('auth.form-revisor');
        return redirect('/')->with('message', 'You shall not pass!');
    }
    public function submit(Request $request){
        $name = $request->name;
        $email = $request->email;
        $body = $request->body;
        
        Mail::to('admin@presto.it')->send(new BecomeRevisor($name, $email, $body));
        return redirect(route('welcome'))->with('message', 'Grazie per averci contattato');
    }

    public function makeRevisor($email)
    {
        Artisan::call('presto:make-user-revisor', ["email"=>$email]);
        return redirect('/')->with('message', 'Congratulazioni! L\'utente è diventato revisore');
    }
    public function editArticle(Article $article){

        $article->setAccepted(null);
        return redirect(route('welcome'))->with('message', 'Complimenti, sei tornato indietro l\'annuncio');
      
    }
}
