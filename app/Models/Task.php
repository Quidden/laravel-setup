<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'project_id',
        'author_id',
        'assigned_to',
        'due_date',
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }
    public function author(){
        return $this->belongsTo(User::class, 'author_id');
    }
    public function actor(){
        return $this->belongsTo(User::class, 'assigned_to');
    }
    public function comment(){
        return $this->hasMany(Comment::class);
    }
    public function file_task(){
        return $this->morphMany(File::class, 'fileable');
    }
}
