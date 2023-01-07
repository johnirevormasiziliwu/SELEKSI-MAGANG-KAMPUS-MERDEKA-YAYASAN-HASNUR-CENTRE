<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitorings extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'client',
        'name',
        'email',
        'image',
        'start_date',
        'end_date',
        'progress'
    ];

    public function scopeFilter($query, array $filters) {
        if(isset($filters['search']) ? $filters['search'] : false) {
           return $query->where('title', 'like', '%' . $filters['search'] . '%')
           ->orWhere('client', 'like', '%' . $filters['search'] . '%')
           ->orWhere('name', 'like', '%' . $filters['search']. '%')
           ->orWhere('email', 'like', '%' . $filters['search'] . '%')
           ->orWhere('start_date', 'like', '%' . $filters['search']. '%')
           ->orWhere('end_date', 'like', '%' . $filters['search']. '%');
        }
    }

}
