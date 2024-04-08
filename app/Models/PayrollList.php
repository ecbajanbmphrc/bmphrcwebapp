<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollList extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "payroll_lists";
}
