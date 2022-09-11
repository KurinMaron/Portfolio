<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Postrequest extends FormRequest
{
    public function rules()
    {
        return [
            'post.title_id' => 'required|integer',
            'post.body' => 'required|string|max:4000',
        ];
    }
}
