<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcements extends Model
{
    protected $fillable =['title', 'descrition', 'company_id', 'image'];
    use HasFactory;
}
