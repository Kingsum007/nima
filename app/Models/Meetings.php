<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meetings extends Model
{
    protected $fillable = [
        'title',
        'meeting_date',
        'meeting_agenda',
        'meeting_decision',
        'meeting_members',
        'meeting_sign_image',
        'meeting_members_image'
    ];
    use HasFactory;
}
