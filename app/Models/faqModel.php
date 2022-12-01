<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faqModel extends Model
{
    use HasFactory;
    protected $table = 'faqs';
    protected $fillable = [
        'question',
        'answer',
    ];
}