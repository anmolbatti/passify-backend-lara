<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\File;

class ValidateImageSize implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Check if $value is not null and is not a string
        if (!is_null($value) && !is_string($value) && !File::exists($value->getPathname())) {
            if ($attribute == 'logo_image') {
                $fail("The Card Logo is not a valid file.");
            } elseif ($attribute == 'icon_image') {
                $fail("The Notification icon is not a valid file.");
            } elseif ($attribute == 'strip_bg_image') {
                $fail("The Strip background image is not a valid file.");
            } elseif ($attribute == 'picked_stamps_image') {
                $fail("The Stamped Image is not a valid file.");
            } elseif ($attribute == 'un_stamps_image') {
                $fail("The Unstamped Image is not a valid file.");
            } else {
                $fail("The $attribute is not a valid file.");
            }
            return;
        }

        // Check file size (in KB)
        if (!is_string($value) && $value->getSize() > 1024 * 1024) {
            if ($attribute == 'logo_image') {
                $fail("The Card Logo must be less than 1 MB.");
            } elseif ($attribute == 'icon_image') {
                $fail("The Notification icon must be less than 1 MB.");
            } elseif ($attribute == 'strip_bg_image') {
                $fail("The Strip background image must be less than 1 MB.");
            } elseif ($attribute == 'picked_stamps_image') {
                $fail("The Stamped Image must be less than 1 MB.");
            } elseif ($attribute == 'un_stamps_image') {
                $fail("The Unstamped Image must be less than 1 MB.");
            } else {
                $fail("The $attribute must be less than 1 MB.");
            }
            return;
        }
    }
}
