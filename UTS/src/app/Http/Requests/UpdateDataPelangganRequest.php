<?php

namespace App\Http\Requests;

use App\Models\DataPelanggan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDataPelangganRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('data_pelanggan_edit');
    }

    public function rules()
    {
        return [
            'id' => [
                'string',
                'nullable',
            ],

            'name' => [
                'string',
                'nullable',
            ],

            'email' => [
                'string',
                'nullable',
            ],

            'no_telp' => [
                'string',
                'nullable',
            ],
        ];
    }
}
