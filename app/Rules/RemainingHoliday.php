<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class RemainingHoliday implements Rule
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
        $fieldNames = ['jan', 'feb', 'Mar', 'apr', 'may', 'jun', 'jul', 'Aug', 'sep',  'oct', 'nov', 'dec'];
        // $sum = $value->jan + $value->feb + $value->Mar + $value->apr + $value->may + $value->jun + $value->jul + $value->Aug +  $value->sep +  $value->oct + $value->nov + $value->dec;
        $sum = 0;
        foreach ($fieldNames as $fieldName) {
            $sum += $value->$fieldName;
        }
        $remaing = $value->remaining;

        return $remaing > $sum;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "You Don't have Much Remaining Holidays";
    }
}
