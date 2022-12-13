<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subServicesModel extends Model
{
    use HasFactory;
    protected $table =  'sub_services';
    protected $fillable = [
        'service_id',
        'name',
        'description',
        'image',
        'features',
    ];
}
