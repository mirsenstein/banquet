<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DrinkRequest extends FormRequest
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
                    Rule::unique('drinks', 'name')->where('restaurant_id', $this->restaurant_id)->ignore($this->drink)
                ],
                'price' => 'required|gt:0',
                'restaurant_id' => '',
            ];
        }

    public function messages()
        {
            return [
                'name.required' => 'Името на напитката е задължително!',
                'name.unique' => 'Вече съществува напитка с това име в този ресторант!',
                'name.max' => 'Името на напитката не може да бъде повече от 100 символа',
                'price.required' => 'Цената на напитката е задължителна!',
                'price.gt' => 'Цената на напитката не може да бъде по-ниска от 0лв',

            ];
        }
}
