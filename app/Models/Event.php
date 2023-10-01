<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'type',
        'user_id',
        'description',
        'eventDateTime',
        'reservationDeadline',
        'isClosed',
    ];

    // Specify the date format for the 'eventDateTime' attribute
    protected $dates = ['eventDateTime'];

    // Limit the description to a certain length
    protected $maxLength = 255;

    // Accessor to limit the description length
    public function getDescriptionAttribute($value)
    {
        return mb_strlen($value) > $this->maxLength ? mb_substr($value, 0, $this->maxLength) . '...' : $value;
    }

}
