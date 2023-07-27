<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function article_category()
    {
        return $this->belongsTo(ArticleCategory::class);
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
