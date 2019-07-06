<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentsRequest;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(CommentsRequest $request, \App\Article $article)
    {
        $comment=$article->comments()->create(array_merge(
            $request->all(),
            ['user_id'=>auth()->user()->id]
        ));

        return redirect(route('articles.show', $article->id).'#comment_'.$comment->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentsRequest $request, \App\Comment $comment)
    {
        $comment->update($request->all());

        return redirect(route('articles.show', $comment->commentable->id).'#comment_'.$comment->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Comment $comment)
    {
        $comment->delete();

        return response()->json([], 201);
    }
}
