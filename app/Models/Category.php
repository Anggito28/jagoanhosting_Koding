<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function occupants()
    {
        return $this->hasMany(Occupants::class);
    }

    public function houseServices()
    {
        return $this->hasMany(HouseService::class);
    }
}
