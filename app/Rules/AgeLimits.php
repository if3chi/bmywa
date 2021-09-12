<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AgeLimits implements Rule
{

    protected array $ageLimits = [];
    protected string $entryType;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($ageLimits, $entryType)
    {
        $this->ageLimits = $ageLimits;
        $this->entryType = ucwords(implode(" ", explode('-', $entryType)));
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
        return $this->ageLimits[0] <= $value && $value <= $this->ageLimits[1];
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->entryType == '' 
        ? "Kindly select your entry type."
        : 'The age limits for ' . $this->entryType . ' is ' . $this->ageLimits[0] . '-' . $this->ageLimits[1] . 'yrs';
    }
}
