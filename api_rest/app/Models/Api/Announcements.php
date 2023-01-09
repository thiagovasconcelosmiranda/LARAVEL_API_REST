<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcements extends Model
{
    protected $fillable =['title', 'descrition', 'client_id', 'gallery_id', 'state', 'photo'];
    use HasFactory;
}
