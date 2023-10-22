<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ReservationDeadlineBeforeEvent implements Rule
{
    public function passes($attribute, $value)
    {
        $eventDateTime = request()->input('eventDateTime');

        return strtotime($value) < strtotime($eventDateTime);
    }

    public function message()
    {
        return 'The reservation deadline must be before the event date and time.';
    }
}
