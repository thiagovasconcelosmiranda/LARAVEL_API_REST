<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geolocalization extends Model
{
    protected $fillable = ['latitude', 'longitude', 'companie_id'];
    use HasFactory;
}
