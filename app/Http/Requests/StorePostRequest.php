<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title'          => 'required|min:3|unique:posts',
            'description'    => 'required|min:10',
            'post-creator'   => 'required|exists:users,id',
            'post-img'       => 'image|mimes:jpg,png,jpeg,gif'
        ];
    }

}
