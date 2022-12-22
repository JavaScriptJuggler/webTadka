<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogs extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $fillable = [
        'author',
        'heading',
        'description',
        'blog_category',
        'meta_title',
        'meta_description',
        'image',
    ];
    public function blogCategory()
    {
        return $this->hasOne(blog_categories::class, 'id', 'blog_category');
    }
}
