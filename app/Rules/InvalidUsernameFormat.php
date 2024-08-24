<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class InvalidUsernameFormat implements Rule
{
    public function passes($attribute, $value)
    {
        // Implement your logic to check for valid username formats
        // Return false to indicate that the username format is invalid
        return false;
    }

    public function message()
    {
        return 'Invalid Username Format';
    }
}
