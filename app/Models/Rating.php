<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_teacher',
        'id_student',
        'id_matter',
        'id_grade',
        'id_group',
        'rating',
        'comment',
    ];
}
