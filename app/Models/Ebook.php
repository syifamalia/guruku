<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    use HasFactory, Sluggable;
    
    protected $guarded = ['id'];

    protected $attributes = [
        'downloadCount' => '0',
    ];

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
