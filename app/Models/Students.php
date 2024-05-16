<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone',
        'email',
        'parents_name',
        'timeslot_day',
        'time',
        'birthdate',
        'gender',
        'status',
    ];
}
