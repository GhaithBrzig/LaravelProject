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
    ];

    /**

     * The tags that belong to the service.

     */

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'ServiceTag');
    }
}
