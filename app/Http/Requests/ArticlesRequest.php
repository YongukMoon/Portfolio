<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|min:10',
            'content'=>'required|min:10',
            'tags'=>'required|array',
            'files'=>'array',
            'files.*'=>'mimes:jpeg,jpg,png,zip,tar|max:30000',
        ];
    }

    public function getAttachments(){
        return \App\Attachment::whereIn('id', $this->input('attachments', []))->get();
    }
}
