<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subscribeModel extends Model
{
    use HasFactory;
    protected $table = 'subscribes';
    protected $fillable = [
        'name',
        'email',
        'date',
        'time',
    ];
}
