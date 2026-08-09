<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Societe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rc',
        'ice',
        'if',
        'email',
        'phone',
        'address',
    ];

    public function paymentOrders() : MorphMany
    {
        return $this->morphMany(PaymentOrder::class, 'beneficiary');
    }
}
