<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Filterable;
    /**
     * @var mixed|string
     */
    protected $table = 'products';
    protected $guarded = false;

    public function getPublishedTextAttribute()
    {
        return $this->is_published ? 'Yes' : 'No';
    }

    public function getImageUrlAttribute()
    {
        return url('storage/'. $this->preview_image);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag', 'product_id', 'tag_id');
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'color_product', 'product_id', 'color_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function model_group()
    {
        return $this->belongsTo(ModelGroup::class, 'model_group_id', 'id');
    }

    public function product_images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

}
