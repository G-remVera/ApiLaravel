<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Resources\ArticleCollection;
use App\Http\Resources\Category as CategoryR;
use App\Http\Resources\TagResource;
use \App\Http\Resources\Article as ArticleR;
use App\Http\Resources\TagCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        ArticleCollection::withoutWrapping();
        return new ArticleCollection(Article::all());
    }

    public function indexByCat($id){
        ArticleCollection::withoutWrapping();
        $article = Category::findOrFail($id)->articles;
        return new ArticleCollection($article);
    }


    public function indexByTag(){
        $getTagId = explode(',',Input::get('tags'));
        $articles = Article::where(function($query) use ($getTagId){
            foreach ($getTagId as $tagId){
                $query->whereHas('tags',function($queryLoop) use ($tagId){
                    $queryLoop->where('article_id',$this->id);
                    $queryLoop->where('tag_id',$tagId);
                });
            }
        })->get();
        return new ArticleCollection($articles);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticle $request)
    {
        $article = Article::create($request->all());
        return $article;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        ArticleR::withoutWrapping();
        $article = Article::find($id);
        return new ArticleR($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return $article;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get the task

        $article = Article::destroy($id);
        return $article;

    }
}
