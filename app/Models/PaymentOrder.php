<?php

namespace App\Models;

use App\Enums\PaymentOrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class PaymentOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'title' ,
        'montant',
        'montant_restant',
        'article_id',
        'beneficiary_id',
        'beneficiary_type',
        'status',
        'meta_data',
        'external_id',
        'platform_id',
    ];

    public function article() : BelongsTo
    {
        return $this->belongsTo(Article::class , 'article_id');
    }

    public function beneficiary() : MorphTo
    {
        return $this->morphTo();
    }

    public function payments() : HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
