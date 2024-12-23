<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RateCard extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "rate_cards";
    // new code added start here
    // protected $fillable = ['rate_card_per_day'];
}
