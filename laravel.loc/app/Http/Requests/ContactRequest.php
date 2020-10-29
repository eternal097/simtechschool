<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'email' => 'required|email',
            'name' => 'required|min:1|max:50',
            'gender' => 'required',
            'photo' => 'required|mimes:jpeg,bmp,png',
            'country' => 'required',
            'text' => 'required|min:5|max:100',
            'apply' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Заполните ваш адрес электронной почты',
            'email.email' => 'Адрес электронной почты указан не корректно',
            'name.required' => 'Заполните ваше имя',
            'name.max' => 'Максимальная длина имени 50 символов',
            'gender.required' => 'Ваш пол не указан',
            'photo.required' => 'Загрузите ваше фото',
            'photo.mimes' => 'Фото должно быть в формате jpeg,bmp,png',
            'country.required' => 'Укажите вашу страну',
            'text.required' => 'Заполните ваше сообщение',
            'text.min' => 'Минимальная длина сообщения 5 символов',
            'text.max' => 'Максимальная длина сообщения 100 символов',
            'apply.required' => 'Вы не согласились на обработку ваших данных',

        ];
    }
}
