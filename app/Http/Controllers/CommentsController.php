<?php

namespace App\Http\Controllers;

use App\Comment;
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

        //event(new \App\Events\CommentCreated($comment));

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
    public function update(CommentsRequest $request, Comment $comment)
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
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->json([], 201);
    }

    public function vote(Request $request, Comment $comment){
        $this->validate($request, [
            'vote'=>'required|in:up,down',
        ]);

        if($comment->votes()->whereUserId($request->user()->id)->exists()){
            return response()->json(['error'=>'already_voted'], 401);
        }

        $up=($request->input('vote') == 'up') ? true : false;

        $comment->votes()->create([
            'user_id'=>request()->user()->id,
            'up'=>$up,
            'down'=>!$up,
            'voted_at'=>\Carbon\Carbon::now(),
        ]);

        return response()->json([
            'value'=>$comment->votes()->sum($request->input('vote'))
        ]);
    }
}
