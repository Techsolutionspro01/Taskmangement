<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    public function users()
    {
        return $this->belongsToMany(User::class, 'task_user');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
