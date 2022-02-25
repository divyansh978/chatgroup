<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatgroup extends Model
{
    use HasFactory;

    public $primaryKey = "name";
    public $timestamps = false;
}
