<?php

namespace App\Models;
use App\Models\Scatergory;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'video',
        'excerpt',
        'body',
        'user_id',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'featured',
        'published',
        'disable_comment',
        'views'
    ];

    public function scategories()
    {
        return $this->belongsToMany(Scategory::class);
    }
}
