<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'serviceName',
        'pricePerHour',
        'description',
        'type',
        'user_id'
    ];

    /**

     * The tags that belong to the service.

     */

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'ServiceTag');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
