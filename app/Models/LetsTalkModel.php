<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetsTalkModel extends Model
{
    use HasFactory;
    protected $table = 'lets_talk';
    protected $fillable=[
        'name',
        'email',
        'phone',
        'business_name',
        'country',
        'state',
        'address',
        'project_details',
        'subscribed',
        'date',
        'time',
    ];
}
