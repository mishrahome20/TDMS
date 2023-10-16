<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $fillable = [
        'title',
        'description',
        'deadline',
        'priority',
        'project_id',
        'created_by',
        'updated_by'
    ];

    public function taskType()
    {
        return $this->belongsToMany(TaskType::class,'task_pivot_types','task_id','task_type_id');
    }

    public function collaborator()
    {
        return $this->hasMany(Collaborators::class,'task_id');
    }

    public function TaskAttachment()
    {
        return $this->hasMany(Attachment::class,'task_id');
    }
}
