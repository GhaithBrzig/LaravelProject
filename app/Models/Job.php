<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'monthly_salary',
        'tags',
        'location',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'job_tags');
    }
}
