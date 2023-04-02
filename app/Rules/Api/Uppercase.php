<?php

namespace App\Rules\Api;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Uppercase implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (preg_match_all("/[A-Z]+/", $value) < 1) {
            $fail('The :attribute must contain a minimum of 1 character in the upper register of legal entities.');
        }
    }
}
