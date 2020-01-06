<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'group_id' => ['required', 'numeric'],
        ];
    }

    /**
     * Получить сообщения об ошибках для определённых правил проверки.
     *
     * @return array
     */
    public function messages()
    {
      return [
        'name.required' => 'Необходимо указать ФИО сотрудника',
        'name.max'  => 'Введенное значение слишком большое',
        'email.required'  => 'Необходимо указать email',
        'email.unique'  => 'Этот email уже используется другим пользователем',
        'email.max'  => 'Введенное значение слишком большое',
        'group_id.required'  => 'Необходимо указать группу',
        'group_id.numeric'  => 'id группы не число',
      ];
    }
}
