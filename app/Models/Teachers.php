<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'father_name',
        'gender',
        'nid_number',
        'nima_id',
        'phone',
        'image'
    ];
}
