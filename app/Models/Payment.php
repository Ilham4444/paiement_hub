<?php

namespace App\Models;

use App\Enums\PaymentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Payment extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'reference',
        'montant',
        'date_paiement',
        'status',
        'transaction_reference',
        'transaction_number',
        'justification',
        'payment_order_id',
        'processed_by',
    ];

    public function registerMediaCollections(): void
    {
    $this
        ->addMediaCollection('justification')
        ->singleFile()
        ->acceptsMimeTypes(['application/pdf', 'image/jpeg', 'image/png']);
    }

    public function paymentOrder() : BelongsTo
    {
        return $this->belongsTo(PaymentOrder::class);
    }

    public function processedBy() : MorphTo
    {
        return $this->morphTo();
    }
}