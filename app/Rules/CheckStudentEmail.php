<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class CheckStudentEmail implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->year = '';
        $this->semester = 0;
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
        $configuration = \App\Configuration::first();
        $this->year = $configuration->year;
        $this->semester = $configuration->semester;
        $user = User::where(['email' =>  $value])->where(function($query) {
                    $query->whereHas('student', function($query) {
                        $query->where(['year' => $this->year, 'semester' => $this->semester]);
                    })->orWhere('role', '<>', 3);
                })->first();
        return $user ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute has been used.';
    }
}
