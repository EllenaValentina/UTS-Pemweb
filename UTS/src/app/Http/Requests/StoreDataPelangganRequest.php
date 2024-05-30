<?php

namespace App\Http\Requests;

use App\Models\DataPelanggan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDataPelangganRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('datapelanggan_create');
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
