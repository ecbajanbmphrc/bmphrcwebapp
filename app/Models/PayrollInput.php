<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollInput extends Model
{
    use HasFactory;

    public $timestamps = false;

    // protected $table = "transaction_lists"; 

    // new code added starts here

    protected $table = "transaction_list";

    protected $fillable = [
        'manning_lists'
    ];

    // new code added ends here
}
