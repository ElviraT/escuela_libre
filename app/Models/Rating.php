<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function matter(): BelongsTo
    {
        return $this->belongsTo(Matter::class, 'id_matter', 'id');
    }

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class, 'id_grade', 'id');
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'id_group', 'id');
    }
}
