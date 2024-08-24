<?php

namespace App\Http\Requests;

use App\Helpers\Helpers;
use App\Helpers\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

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
        $username = $this->input('username');

        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $rules = ['username' => 'required|email|unique:users,username'];
        } elseif ($this->checkPhone($username)) {
            $rules = ['username' => 'required'];
        } else {
            return $this->error('Username Invalid Format')
        }
        return array_merge($rules, [
            'name' => 'required|max:255',
            'password' => 'required'
        ]);
    }

    protected function failedValidation(Validator $validator)
    {
        foreach ($validator->errors()->messages() as $message){
            return $this->error($message[0], 422);
        }
        return $this->error(':)');
    }
}
