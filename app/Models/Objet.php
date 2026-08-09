<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Objet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'service_id',
    ];

    public function service() : BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function articles() : HasMany
    {
        return $this->hasMany(Article::class);
    }
}
