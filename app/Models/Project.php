<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
      //  'status',
        'currentProgress',
        'budget',
        'client_id',
    ];


    // Define the 'status' attribute as an enum
   // protected $enumCasts = [
   //     'status' => Status::class,
   // ];

    // Accessor for 'start_date' attribute
    public function getStartDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d'); // Format the date as needed
    }

    // Accessor for 'end_date' attribute
    public function getEndDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d'); // Format the date as needed
    }

    // Define relationships
    public function tasks()
{
    return $this->hasMany(Task::class);
}

public function client()
{
    return $this->belongsTo(User::class, 'client_id');
}

}
