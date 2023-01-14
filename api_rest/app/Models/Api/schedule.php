<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    protected $fillable =['title','date', 'time' ,'descrition', 'client_id', 'authClient_id', 'created_at', 'status'];
    use HasFactory;
}
