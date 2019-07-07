<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticlesRequest;

class ArticlesController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except'=>['index', 'show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $slug='')
    {
        $query=$slug
        ? \App\Tag::whereSlug($slug)->firstOrFail()->articles()
        : new \App\Article;

        $query=$query->orderBy(
            $request->input('sort', 'created_at'),
            $request->input('order', 'desc')
        );

        if($keyword=$request->input('q')){
            $raw='MATCH(title,content) AGAINST(? IN BOOLEAN MODE)';
            $query=$query->whereRaw($raw, [$keyword]);
        }

        $articles=$query->paginate(5);

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Article $article)
    {
        return view('articles.create', compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticlesRequest $request)
    {
        $article=auth()->user()->articles()->create($request->all());

        if(!$article){
            flash('Article store fail');
            return redirect(route('articles.create'));
        }

        $article->tags()->sync($request->input('tags'));

        $request->getAttachments()->each(function($attachment)use($article){
            $attachment->article()->associate($article);
            $attachment->save();
        });

        flash('Article store success');
        return redirect(route('articles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $comments=$article
        ->comments()
        ->with('replies')
        ->whereNull('parent_id')
        ->get();

        return view('articles.show', compact('article', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $this->authorize('update', $article);

        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticlesRequest $request, Article $article)
    {
        $article->update($request->all());
        $article->tags()->sync($request->input('tags'));

        flash('Article update success');
        return redirect(route('articles.show', $article->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);
        $this->attachmentsDelete($article);
        $article->delete();

        flash('article delete success');
        return response()->json([], 204);
    }

    protected function attachmentsDelete(Article $article){
        $article->attachments->each(function($attachment){
            $file=attachments_path($attachment->filename);

            if(\File::exists($file)){
                \File::delete($file);
            }

            $attachment->delete();
        });
    }
}
