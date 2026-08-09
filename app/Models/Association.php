<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Association extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date_depot',
    ];

    public function paymentOrdes() : MorphMany
    {
        return $this->morphMany(PaymentOrde::class, 'beneficiary');
    }

}
