<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticlesRequest;

class ArticlesController extends Controller implements Cacheable
{
    public function __construct(){
        parent::__construct();
        $this->middleware('auth', ['except'=>['index', 'show']]);
    }

    public function cacheTags(){
        return 'articles';
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $slug='')
    {
        $cacheKey=cache_key('articles.index.'.$slug);

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

        $articles=$this->cache($cacheKey, 5, $query, 'paginate', 5);

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
        $payload=array_merge(
            $request->all(),
            ['notification'=>$request->has('notification')]
        );

        $article=auth()->user()->articles()->create($payload);

        if(!$article){
            flash()->error(trans('flash.ArticlesController.store_fail'));
            return redirect(route('articles.create'));
        }

        $article->tags()->sync($request->input('tags'));

        $request->getAttachments()->each(function($attachment)use($article){
            $attachment->article()->associate($article);
            $attachment->save();
        });

        event(new \App\Events\Modelchanged('articles'));

        flash(trans('flash.ArticlesController.store'));
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
        ->withTrashed()
        ->whereNull('parent_id')
        ->latest()
        ->get();

        $article->view_count += 1;
        $article->save();

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
        $payload=array_merge(
            $request->all(),
            ['notification'=>$request->has('notification')]
        );

        $article->update($payload);
        $article->tags()->sync($request->input('tags'));

        event(new \App\Events\Modelchanged('articles'));

        flash(trans('flash.ArticlesController.update'));
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

        event(new \App\Events\Modelchanged('articles'));

        flash(trans('flash.ArticlesController.destroy'));
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
