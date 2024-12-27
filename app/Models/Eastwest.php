<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eastwest extends Model
{
    use HasFactory;

    
    public $timestamps = false;

    protected $table = "gcash_lists";
}
