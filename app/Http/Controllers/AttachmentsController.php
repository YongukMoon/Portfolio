<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttachmentsController extends Controller
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
    public function store(Request $request)
    {
        $attachment=[];

        if($request->hasFile('files')){
            $files=$request->file('files');
            
            foreach($files as $file){
                $filename=str_random().filter_var($file->getClientOriginalName(), FILTER_SANITIZE_URL);
                $file->move(attachments_path(), $filename);
                $payload=[
                    'filename'=>$filename,
                    'bytes'=>$file->getClientSize(),
                    'mime'=>$file->getClientMimeType(),
                ];

                $attachment[]=($id=$request->input('article_id'))
                ? \App\Article::whereId($id)->firstOrFail()->attachments()->create($payload)
                : \App\Attachment::create($payload);
            }
        }

        return response()->json($attachment);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Attachment $attachment)
    {
        $file=attachments_path($attachment->filename);

        if(\File::exists($file)){
            \File::delete($file);
        }

        $attachment->delete();

        return response()->json($attachment, 201);
    }
}
