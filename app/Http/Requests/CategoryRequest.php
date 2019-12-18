<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    
    public function authorize()
        {
            return true;
        }

        
    public function rules()
        {
            return [
                'name' => 'required|unique:categories|max:50',
            ];
        }

    public function messages()
        {
            return [
                'name.required' => 'Името на категорията е задължително!',
                'name.unique' => 'Вече съществува категория с това име!',
                'name.max' => 'Името на категорията не може да бъде повече от 50 символа',
            ];
        }
}
