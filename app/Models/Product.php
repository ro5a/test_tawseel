<?php

namespace App\Models;

use DoniaShaker\MediaLibrary\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function media()
    {
        return $this->hasOne(Media::class, 'model_id')->where('model', 'product');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
