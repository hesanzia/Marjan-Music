<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSongRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name'     => [

                'required',
            ],
            'singer_id' => [

                'required',
            ],
            'songwriter_id' => [

                'required',
            ],
            'producer_id' => [

                'required',
            ],
            'composer_id' => [
                'string',
            ],
            'picture' => [
                'string',
            ],
            'Link' => [
                'string',
            ],
        ];
    }

    public function authorize()
    {
        return Gate::allows('admin');
    }
}
