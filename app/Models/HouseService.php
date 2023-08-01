<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseService extends Model
{
    use HasFactory;

    protected $fillable = [
        'occupant_id',
        'date_of_entry',
        'house_number',
        'status',
        'keamanan',
        'kebersihan',
        'information',
        'category_id',
    ];

    public function occupant()
    {
        return $this->belongsTo(Occupants::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
