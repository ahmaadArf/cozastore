<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Size;
use App\Models\Color;
use App\Models\Review;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

    public function Category()
    {
       return $this->belongsTo(Category::class);
    }
    public function Images()
    {
        return $this->hasMany(ProductImage::class);

    }
    public function Reviews()
    {
        return $this->hasMany(Review::class);

    }
    public function Carts()
    {
        return $this->hasMany(Cart::class);

    }
    public function Favorite()
    {
        return $this->hasOne(Favorite::class);

    }
    public function Colors()
    {
        return $this->belongsToMany(Color::class);
    }
    public function Sizes()
    {
        return $this->belongsToMany(Size::class);
    }
}
