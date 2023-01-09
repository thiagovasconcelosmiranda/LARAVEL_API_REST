<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable =['imgOne', 'imgTwo', 'imgThree', 'imgFour', 'client_id'];
    use HasFactory;

}
