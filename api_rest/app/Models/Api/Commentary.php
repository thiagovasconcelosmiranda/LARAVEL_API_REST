<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentary extends Model
{
    protected $fillable = ['commentary', 'note', 'client_id'];
    use HasFactory;
}
