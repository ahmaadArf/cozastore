<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Color extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];
    public function Products()
    {
        return $this->belongsToMany(Product::class);
    }
    protected function Name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
            // set: fn (string $value) => strtoupper($value),
        );
    }
}
