<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addressClient extends Model
{
    protected $fillable =['address', 'cep', 'number', 'district', 'city', 'state', 'client_id'];

    use HasFactory;
}
