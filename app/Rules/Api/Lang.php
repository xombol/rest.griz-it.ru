<?php

namespace App\Rules\Api;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Lang implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $chr_en = "a-zA-Z0-9\s`~!@#$%^&*()_+-={}|:;<>?,.\/\"\'\\\[\]";
        if (preg_match_all("/^[$chr_en]+$/", $value) < 1) {
            $fail('The :attribute must  contain only English letters.');
        }
    }
}
