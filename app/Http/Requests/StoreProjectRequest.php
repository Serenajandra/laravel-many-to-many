<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => ['required', 'max:150', 'unique:projects'],
            'subject' => ['required'],
            'presentation' => ['required'],
            'type_id' => ['nullable', 'exists:types,id'],
            'image' => ['nullable', 'image'],
            'content' => ['required'],
            'technologies' => ['exists:technologies, id']
        ];
    }
}
