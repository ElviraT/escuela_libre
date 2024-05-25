<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Matter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'id_grade', 'id_status'
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'id_status', 'id');
    }
    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class, 'id_grade', 'id');
    }
}
