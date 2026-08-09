<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class PersonnePhysique extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cin',
        'email',
        'phone',
        'address',
    ];

    
    public function paymentOrdes() : morphMany
    {
        return $this->morphMany(PaymentOrde::class, 'beneficiary');
    }
}
