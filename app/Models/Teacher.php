<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}