<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assets extends Model
{
    protected $fillable =[
        'title',
        'location',
        'category',
        'details'
    ];
    use HasFactory;
}
