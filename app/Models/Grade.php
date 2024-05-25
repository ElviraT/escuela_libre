<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'id_status'
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'id_status', 'id');
    }

    public function group(): HasMany
    {
        return $this->hasMany(Group::class, 'id_grade');
    }

    public function matter(): HasMany
    {
        return $this->hasMany(Matter::class, 'id_grade');
    }
}
