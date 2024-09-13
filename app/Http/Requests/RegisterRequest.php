<?php

namespace App\Http\Requests;

use App\Helpers\Helpers;
use App\Helpers\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\InvalidUsernameFormat;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class RegisterRequest extends FormRequest
{
    use Response, Helpers;
    protected $stopOnFirstFailure = true;
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {

        return [
            'username' => 'required',
            'name' => 'required|max:255',
            'password' => 'required'
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        foreach ($validator->errors()->messages() as $message){
            $response = $this->error($message[0], 422);
            throw new ValidationException($validator, $response);
        }
    }
}
