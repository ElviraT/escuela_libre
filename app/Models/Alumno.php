<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_representative',
        'id_gender',
        'id_relation',
        'name',
        'last_name',
        'dni',
        'birthdate',
        'type_blood',
        'is_alergy',
        'type_alergy',
        'is_disability',
        'type_disability',
        'registration',
        'id_user',
        'id_group'
    ];

    public function relacion(): BelongsTo
    {
        return $this->belongsTo(Relationship::class, 'id_relation');
    }
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'idStatus', 'id');
    }
}
