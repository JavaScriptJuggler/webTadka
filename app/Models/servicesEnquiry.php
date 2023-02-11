<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicesEnquiry extends Model
{
    use HasFactory;
    protected $table = 'service_enquiry';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'businessname',
        'country',
        'state',
        'address',
        'project_details',
        'service_id',
        'subservice_id',
        'date',
        'time',
    ];
}
