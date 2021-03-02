<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\TestResource;
use App\Article;
use App\tag;
use Dompdf\Dompdf;
use PDF;

class ArticleController extends Controller
{
    public function show($id)
    {
    	$articleid['articles'] = Article::findorfail($id);
    	return view('articles.show', $articleid);
    }

    public function index()
    {   
        if(request('tag')){
            
            $articlelist['alists']  = tag::where('tag_name', request('tag'))->firstorFail()->articles;
            //return $articles;
        }else{
           $articlelist['alists'] = Article::latest()->get(); 
        }
    	
    	return view('articles.articles', $articlelist);
    }

    public function create()
    {
        $tags['tags'] = tag::all();
    	return view('articles.articleform', $tags);
    }

    public function store()
    {
    	// request()->validate([
    	// 	'title' => 'required',
    	// 	'excerpt' => 'required',
    	// 	'body' => 'required'
    	// ]);

    	// $article = new Article();

    	// $article->title = request('title');
    	// $article->excerpt = request('excerpt');
    	// $article->body = request('body');

    	// $article->save();
      $article = new Article($this->validatearticle());

      $article->user_id = 1;
      $article->save();

      $article->tags()->attach(request('tags'));

    	return redirect('/articles');

    }

    public function edit(Article $id)
    {
    	//$articlebyid['article'] = Article::find($id);
    	return view('articles.editform', ['asrticle' => $id]);
    }

   	public function update(Article $id)
   	{
   		$articleattributes = $this->validatearticle();

      $id->update($articleattributes);
   		return redirect('/articles');

   	}
    
    public function validatearticle()
    {
       return request()->validate([
        'title' => 'required',
        'excerpt' => 'required',
        'body' => 'required',
        'tags' => 'exists:tags,id'
      ]);

    }

    public function dpdf()
    {
      $articlelist['alists'] = Article::all();
      // return view('articles.articles', $articlelist);
      $pdf  = PDF::loadView('articles.articles', $articlelist);
      return $pdf->download('articles.pdf');
    }


}
