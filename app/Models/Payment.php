<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_bank',
        'id_representative',
        'id_user',
        'monto',
        'reference',
        'payment_date',
        'id_status',
        'id_method'
    ];

    public function representative(): BelongsTo
    {
        return $this->belongsTo(Representative::class, 'id_representative');
    }

    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class, 'id_bank');
    }
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'id_status');
    }
}
