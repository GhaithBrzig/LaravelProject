<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'taskName',
        'description',
        'startDate',
        'endDate',
        'project_id'
    ];


    public function getStartDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d');
    }

    // Accessor for 'end_date' attribute
    public function getEndDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d');
    }

    //relationship
    public function project()
{
    return $this->belongsTo(Project::class, 'project_id');
}



}



