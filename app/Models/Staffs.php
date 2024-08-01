<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staffs extends Model
{
    use HasFactory;
    protected $fillable = [
    'full_name',
    'father_name',
    'gender',
    'province',
    'position',
    'nid_number',
    'nima_id',
    'phone',
    'image'
        
    ];
}
