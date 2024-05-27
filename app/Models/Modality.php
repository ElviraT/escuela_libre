<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Modality extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'id_status'
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'id_status', 'id');
    }
}
