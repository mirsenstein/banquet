<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MealRequest extends FormRequest
{
    public function authorize()
        {
            return true;
        }

    public function rules()
        {
            return [
                'name' => [
                    'required',
                    'max:100',
                    Rule::unique('meals', 'name')->where('restaurant_id', $this->restaurant_id)->ignore($this->meal)
                ],
                'price' => 'required|gt:0',
                'restaurant_id' => '',
                'category_id' => ''
            ];
        }

    public function messages()
        {
            return [
                'name.required' => 'Името на ястието е задължително!',
                'name.unique' => 'Вече съществува ястие с това име в този ресторант!',
                'name.max' => 'Името на ястието не може да бъде повече от 100 символа',
                'price.required' => 'Цената на ястието е задължителна!',
                'price.gt' => 'Цената на ястието не може да бъде по-ниска от 0лв',

            ];
        }
}