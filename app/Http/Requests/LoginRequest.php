<?php

namespace App\Http\Requests;

use App\Helpers\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

/**
 * @property mixed $username
 * @property mixed $password
 */
class LoginRequest extends FormRequest
{
    use Response;
    protected $stopOnFirstFailure = true;
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        $username = $this->input('username');

        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $rules = ['username' => 'required|email'];
        } elseif (is_numeric($username)) {
            $rules = ['username' => 'required|numeric'];
        } else {
            return ['username' => 'required|invalid_format'];
        }

        return array_merge($rules, [
            'password' => 'required'
        ]);

    }

    protected function failedValidation(Validator $validator)
    {
        foreach ($validator->errors()->messages() as $message){
            $response = $this->error($message[0], 422);
            throw new ValidationException($validator, $response);
        }
    }
}
