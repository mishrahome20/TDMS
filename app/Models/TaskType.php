<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskType extends Model
{
    use HasFactory;
    protected $fillable = [
        'tasktype',
        'created_by',
        'updated_by'
    ];
    protected $table = 'task_types';
}
