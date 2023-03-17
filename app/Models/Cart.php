<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function Product()
    {
        return $this->belongsTo(Product::class);

    }
    public function User()
    {
        return $this->belongsTo(User::class);

    }
}
