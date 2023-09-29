<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'tagName',
    ];

    /**

     * The services that belong to the tag.

     */
    public function services()
    {
        return $this->belongsToMany(Service::class, 'ServiceTag');
    }
}
