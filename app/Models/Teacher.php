<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user', 'idSex', 'idStatus', 'idMaritalState', 'register', 'ncolegio'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function Idstatus(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'idStatus', 'id');
    }
    public function time(): HasMany
    {
        return $this->hasMany(Time::class, 'id_teacher');
    }
}
