<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'description',
        'monto',
        'id_status',
        'id_user',
        'id_bank',
        'id_method',
        'payment_date'
    ];
}
