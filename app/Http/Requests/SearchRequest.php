<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'keyword'   => 'required|string',
            'category'   => 'string',
            'date_start' => 'sometimes',
            'date_end'   => 'sometimes',
        ];
    }

    public function filters()
    {
        return [
            'keyword'    => 'trim|escape',
            'category'   => 'trim|escape',
            'date_start' => 'trim|escape',
            'date_end'   => 'trim|escape',
        ];
    }
}
