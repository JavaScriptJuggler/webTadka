<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioModel extends Model
{
    use HasFactory;
    protected $table = 'portfolio';
    protected $fillable = [
        'portfolio_name',
        'potrfolio_description',
        'short_description',
        'images',
        'links',
        'category_id',
    ];

    public function category()
    {
        return $this->hasOne(PortfolioCategoryModel::class, 'id', 'category_id');
    }
}
