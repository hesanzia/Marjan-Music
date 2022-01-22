<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreSongwriterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'     => [

                'required',
            ],
            'nationality' => [

                'required',
            ],
            'age' => [

                'required',
            ],
            'about' => [

                'required',
            ],
            'picture' => [
                'string',
            ],
        ];
    }

    public function authorize()
    {
        return Gate::allows('admin');
    }
}
