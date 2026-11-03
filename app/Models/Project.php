<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    public function creator(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function tasks(){
        return $this->hasMany(Task::class, 'project_id');
    }
    public function file_proj(){
        return $this->morphMany(File::class, 'fileable');
    }
}
