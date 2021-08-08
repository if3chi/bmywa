<?php

namespace App\Rules;

use Illuminate\Support\Str;
use Illuminate\Contracts\Validation\Rule;

class MinWords implements Rule
{

    protected int $minWords;
    protected int $entryCount;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($minWords)
    {
        $this->minWords = $minWords;
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
        $this->entryCount = Str::of($value)->wordCount();

        return $this->entryCount >= $this->minWords;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'We allow a minimum of '
            . $this->minWords . ' words, you have '
            . $this->entryCount . ' word(s).';
    }
}
