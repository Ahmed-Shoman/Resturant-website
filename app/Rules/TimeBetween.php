<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class TimeBetween implements Rule
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
        $pickupDate = carbon::parse($value);
        $pickupTime = carbon::createFromTime($pickupDate -> hour , $pickupDate -> minute , $pickupDate ->second);

        $earLiestTime =carbon::createFromTimeString('17:00:00');

        $LastTime = Carbon::createFromTimeString('23:00:00');

        return $pickupTime ->between($earLiestTime , $LastTime)? true : false ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'please choose the time between 17:00.';
    }
}