<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'password' => ['required', 'string'],
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'role' => ['required', 'integer'],
        ];
    }


    public function messages()
    {
        return [
            'email.unique' => "Пользователь с таким email уже существует",
            'email.required' => 'Заполните поле',
            'name.required' => 'Заполните поле',
            'password.required' => 'Заполните поле',
        ];
    }
}
