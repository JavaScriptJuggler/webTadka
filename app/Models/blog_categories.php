<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog_categories extends Model
{
    use HasFactory;
    protected $table = 'blog_categories';
    protected $fillable = [
        'category_name',
    ];
}
