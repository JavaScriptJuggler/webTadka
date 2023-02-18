<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chatbot extends Model
{
    use HasFactory;
    protected $table = 'chatbot';
    protected $fillable = [
        'project',
        'project_details',
        'contact_info',
        'project_assigned',
        'start_date',
        'end_date',
        'follow_up',
        'stage',
        'remark',
        'status',
    ];
}
