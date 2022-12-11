<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioCategoryModel extends Model
{
    use HasFactory;
    protected $table = 'potrfolio_category';
    protected $fillable = [
        'category_name',
    ];
}
