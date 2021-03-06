<?php

namespace App\Http\Requests\User;

use App\Enums\Roles\RoleEnum;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'full_name' => ['required'],
            'email' => ['required', 'unique:users,email'],
            'roles' => ['required', 'array', 'min:1', 'in:'.implode(',', RoleEnum::allValues())]
        ];
    }
}
