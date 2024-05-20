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

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // accessor for formatted created_at
    public function getFormattedCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d-m-Y h:i');
    }

    public function getFormattedStartDateAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['start_date'])->format('d-m-Y');
    }

    public function getFormattedEndDateAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['end_date'])->format('d-m-Y');
    }
}
