<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'role' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'unique:users,email,' . $this->user_id],
            'user_id' => ['required', 'integer', 'exists:users,id']
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
