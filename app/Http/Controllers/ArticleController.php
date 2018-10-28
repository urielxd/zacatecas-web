<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Article;
use Auth;

class ArticleController extends Controller
{
    
    public function create ($id) 
    {
        $category = Category::find($id);
        return view('article.create', compact('category'));
    }
    
    public function show ($id) 
    {
        $article = Article::find($id);
        return view('article.show', compact('article'));
    }

    public function edit ($id) 
    {
        $article = Article::find($id);
        $category = $article->Category;
        return view('article.edit', compact('article', 'category'));
    }
    public function store(Request $request, $id)
    {   
        $this->validate($request, [
            'body' => 'required|string|max:255'
        ]);

        Auth::user()->articles()->create($request->all());
        toast('Agregado correctamente.','success','top-right')->autoClose(6000);
        return redirect()->route('home');
    }

    public function update (Request $request, $id) 
    {
        $article = Article::find($id);
        $article->update($request->all());
        toast('Actualizado correctamente.','success','top-right')->autoClose(6000);
        return redirect()->route('home');
    }

    public function delete ($id) 
    {
        $article = Article::find($id);
    }
}
