<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expenses extends Model
{
    use HasFactory;
    protected $fillable = [
    	'title',
    	'used_by',
		'category',
    	'amount',
    	'details',
    	'reviewer1',
    	'reviewer2',
    	'reviewer3',
    	'bill_image',
    	'verify_image'
    ];
}
