<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instantCallConnect extends Model
{
    use HasFactory;
    protected $table = 'call_connect';
    protected $fillable = [
        'name',
        'phone',
        'priority',
        'city',
        'message',
        'date',
        'time',
    ];
}
