<?php

namespace App\Http\Requests\Api;

use App\Models\User;
use App\Rules\Api\Lang;
use App\Rules\Api\Lower;
use App\Rules\Api\SpecCharacter;
use App\Rules\Api\Uppercase;
use Illuminate\Foundation\Http\FormRequest;

class UserRegRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|regex:/^\\+7[0-9]{10}/|unique:users',
            'password' => ['required', 'min:6', 'confirmed', new Uppercase, new Lower, new SpecCharacter, new Lang],
        ];
    }
}
