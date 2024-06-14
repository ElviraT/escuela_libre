<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Folder extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'id_parent_folder', 'id_user'
    ];

    public function childfolder(): HasMany
    {
        return $this->hasMany(Folder::class, 'id_parent_folder');
    }

    public function file(): HasMany
    {
        return $this->hasMany(File::class, 'id_folder');
    }
}
