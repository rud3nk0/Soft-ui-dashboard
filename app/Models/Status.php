<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'is_active',
        'progress',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
