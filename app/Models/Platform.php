<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Platform extends Model implements HasMedia
{
 use HasFactory;
 use InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
        'base_url',
    ];
    
    public function registerMediaCollections(): void
    {
    $this
        ->addMediaCollection('logo')
        ->singleFile();
    }
// conversion
    public function services() : HasMany
    {
        return $this->hasMany(Service::class);
    }

}
