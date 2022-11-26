<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class toolsTechnologiesModel extends Model
{
    use HasFactory;
    protected $table = 'tools_and_tech';
    protected $fillable = [
        'image',
    ];
}
