<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = "task";

    protected $fillable = [
        'name',
        'user_id',
        'status_id',
    ];



    public function comments()
    {
        return $this->belongsToMany(Comment::class, 'task_comment', 'task_id', 'comment_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
