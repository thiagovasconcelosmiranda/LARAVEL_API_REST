<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'cpf', 'maritalStatus', 'cell','users_id', 'file' ,'facebook', 'linkedin', 'instagram', 'twitter'];
    use HasFactory;
}
