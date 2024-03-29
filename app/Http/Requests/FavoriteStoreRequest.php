<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FavoriteStoreRequest extends FormRequest
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
            'title'     => 'required|string',
            'url'       => 'required|string',
            'url_image' => 'required|string',
            'date'      => 'required|string',
        ];
    }

    public function filters()
    {
        return [
            'title'     => 'trim|escape',
            'url'       => 'trim|escape',
            'url_image' => 'trim|escape',
            'date'      => 'trim|escape',
        ];
    }
}
