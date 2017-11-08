<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Cedula implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('/([0-9]{3}-[0-9]{6}-[0-9]{4}[A-Y])$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.cedula');
    }
}
