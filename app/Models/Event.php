<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable =  [
        'title',
        'color',
        'id_day',
        'startime',
        'endtime',
        'freq',
        'interval',
        'startRecur',
        'endRecur',
        'id_teacher',
        'id_matter',
    ];
}
