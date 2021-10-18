<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assigntask extends Model
{
    use HasFactory;
    protected $fillable = [
        'employeeName',
        'task',
        'date',
        'location',
        'shift',
        'startTime',
        'endTime',
        'totalTime',
    ];
}


