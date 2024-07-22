<?php

namespace App\Http\Requests;

use App\Helpers\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class RegisterRequest extends FormRequest
{
    use Response;
    protected $stopOnFirstFailure = true;
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'phone' => 'required|numeric|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'name' => 'required|max:255',
            'password' => 'required'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        foreach ($validator->errors()->messages() as $message){
            $response = $this->error($message[0], 422);
            throw new ValidationException($validator, $response);
        }

    }
}
