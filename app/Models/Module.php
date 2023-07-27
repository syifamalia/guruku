<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Module extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function training()
    {
        return $this->hasMany(Module::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'tittle'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
