<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    
    protected $fillable = ['content', 'user_id', 'post', 'datePosted', 'likes'];

    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
