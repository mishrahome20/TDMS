<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaborators extends Model
{
    use HasFactory;

    protected $table = 'collaborators';
    protected $fillable = [
        'flag',
        'user_id',
        'collaborators'
    ];
}
