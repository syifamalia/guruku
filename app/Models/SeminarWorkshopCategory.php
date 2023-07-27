<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeminarWorkshopCategory extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function seminarWorkshop()
    {
        return $this->hasMany(SeminarWorkshop::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'tittle'
            ]
        ];
    }
}
