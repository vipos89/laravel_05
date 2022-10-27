<?php

namespace App\Http\Requests;

use App\Rules\SeriaRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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

    protected function prepareForValidation()
    {
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:4|max:255'
        ];
    }


    public function messages()
    {
        return [
          'name.min' => 'Поле :attribute не должно быть короче :min-х символов',
          'name.required' => __('my_validation.message1'),
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'название категории'
        ];
    }


}
