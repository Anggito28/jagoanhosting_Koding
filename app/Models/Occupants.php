<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Occupants extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'registration_number',
        'name',
        'nik',
        'job',
        'gender',
        'age',
        'birth_place',
        'birth_date',
        'phone_number',
        'address',
        'status_tinggal',
        'additional_information',
        'category_id',
    ];

    public function houseServices()
    {
        return $this->hasMany(HouseService::class);
    }
}
