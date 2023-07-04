<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;
    protected $table = 'Billings';
    public $timestamps = false;
    protected $fillable = [
        'number_Card',
        'card_Holder',
        'expires',
    ];
}
