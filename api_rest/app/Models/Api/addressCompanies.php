<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addressCompanies extends Model
{
    protected $fillable =['address', 'cep', 'number', 'district', 'city', 'state', 'companie_id'];
    use HasFactory;
}
