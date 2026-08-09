<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;

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
 public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('medium')
            ->fit(Fit::Crop, 300, 300)
            ->sharpen(10)
            ->performOnCollections('logo');
 
        $this->addMediaConversion('small')
            ->fit(Fit::Crop, 100, 100)
            ->performOnCollections('logo');
    }
    public function services() : HasMany
    {
        return $this->hasMany(Service::class);
    }

}
