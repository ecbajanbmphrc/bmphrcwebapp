<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDoor extends Model
{
    use HasFactory;
    protected $table = 'company_doors';
    public $timestamps = false;
}
