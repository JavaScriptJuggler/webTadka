<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderAndDescriptions extends Model
{
    use HasFactory;
    protected $table = 'heading_text_and_contents';
    protected $fillable = [
        'keyword',
        'heading',
        'description',
    ];
}
