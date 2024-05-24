<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RelationShip extends Model
{
    use HasFactory;

    public function student(): HasMany
    {
        return $this->hasMany(Alumno::class, 'id_relation');
    }
}
