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

    public function scopeFilter($query, array $filters) {


        if($filters['search'] ?? false) {
            $query->where('serviceName', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('type', 'like', '%' . request('search') . '%');
        }
    }
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
