<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'phone' =>  ['phone:RU', 'required'],
            'name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'birthday' => ['required', 'date_format:Y-m-d'],
            'service_id' => ['exists:services,id', 'required']
        ];
    }

    public function messages(): array
    {
        return  [
          'phone.phone' => 'Номер телефона в неверном формате'
        ];
    }
}
