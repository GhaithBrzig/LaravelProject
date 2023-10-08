<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'rating',
        'comment',
        'reviewer',
        'reviewedUser',
    ];

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer', 'id');
    }

    // Define the relationship with the User model for 'reviewedUser'
    public function reviewedUser()
    {
        return $this->belongsTo(User::class, 'reviewedUser', 'id');
    }
}

