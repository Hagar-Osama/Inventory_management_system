<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAboutRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'nullable|string',
            'short_title' => 'nullable|string',
            'description' => 'nullable|min:10|max:2500',
            'image' => 'nullable|image|mimes:png,jpg,svg,jpeg,gif',
            'short_description' => 'nullable|min:10|max:2500',
            'aboutId' => 'required|exists:abouts,id'
        ];
    }
}
