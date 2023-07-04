<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskComment extends Model
{
    use HasFactory;
    protected $table = "task_comment";

    protected $fillable = [
        'task_id',
        'comment_id',
    ];

}
