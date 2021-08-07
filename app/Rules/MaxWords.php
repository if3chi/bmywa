<?php

namespace App\Rules;

use Illuminate\Support\Str;
use Illuminate\Contracts\Validation\Rule;

class MaxWords implements Rule
{

    protected $entryCount;
    protected $total;

    /**
     * Create a new rule instance.
     *
     * @return void
     * 
     */
    public function __construct($entryCount)
    {
        $this->entryCount = $entryCount;
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
        $this->total = Str::of($value)->wordCount();

        return $this->entryCount >= $this->total;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Entry Submission cannot be more than ' . $this->entryCount . ' words, You have ' . $this->total;
    }
}
