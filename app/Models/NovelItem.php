<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NovelItem extends Model
{
    protected $fillable = [
        'content_id', 'category', 'title', 'author', 'image_url',
        'url', 'affiliate_url', 'price', 'review_average', 'review_count',
    ];
}
