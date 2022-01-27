<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title' => 'required|max:190',
            'description' => 'required|max:1000',
            'content' => 'required',
            'post_category_id' => 'required|integer',
            'post_tags_id' => 'nullable|array',
            'image' => 'nullable|image',
            'confirmed' => 'nullable'
        ];
    }
}
