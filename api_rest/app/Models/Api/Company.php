<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['cnpj', 'dateStart',  'category_id', 'client_id' ];

    use HasFactory;
}
