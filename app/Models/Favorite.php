<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favorite extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];
    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
