<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckPrime implements Rule
{
    /**
     * @var int
     */
    private $baseNumber;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(int $baseNumber)
    {
        $this->baseNumber = $baseNumber;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        if ($value == 1) {
            return false;
        }

        if ($value < $this->baseNumber) {
            return false;
        }

        for ($i = 2; $i <= sqrt($value); $i++) {
            if ($value % $i == 0)
                return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'The number is not prime.';
    }
}
