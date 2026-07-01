<?php

namespace App\Http\Requests;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\StrongPassword;
use App\Rules\NoSpaces;
class RegisterRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'name' => ['required', 'string', 'max:255',"min:6",new NoSpaces],
            'email' => ['required', 'string','lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', new StrongPassword],
             'avatar'=>['required','image','mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];
    }
    public function messages(): array
    {
        return [
            'email.unique' => 'هذا البريد الإلكتروني مسجل لدينا بالفعل.',
            'avatar.max' => 'حجم الصورة يجب ألا يتعدى 2 ميجابايت.',
        ];
    }

}
