<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    public $table = "finance";
    protected $fillable = [
        'trans_name',
        'amount',
        'status',
    ];
}
