<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Time extends Model
{
    use HasFactory;
    protected $table = 'times';
    protected $fillable = [
        'id_day',
        'id_teacher',
        'start_hour',
        'end_hour'
    ];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'id_teacher', 'id');
    }

    public function day(): BelongsTo
    {
        return $this->belongsTo(Day::class, 'id_day');
    }
}
