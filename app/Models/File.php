<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'id_folder'
    ];

    public function childfolder(): BelongsTo
    {
        return $this->belongsTo(Folder::class);
    }
}
