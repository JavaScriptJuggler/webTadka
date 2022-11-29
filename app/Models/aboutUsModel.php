<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aboutUsModel extends Model
{
    use HasFactory;
    protected $table = 'about';
    protected $fillable = [
        'about',
    ];
}
