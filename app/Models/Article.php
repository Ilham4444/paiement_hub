<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'tax',
        'objet_id',
    ];

    public function objet() : BelongsTo
    {
        return $this->belongsTo(Objet::class);
    }

    public function paymentOrders() : HasMany
    {
        return $this->hasMany(PaymentOrder::class, 'article_id');
    }
}
