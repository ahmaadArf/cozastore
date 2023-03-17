<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\Review;
use App\Models\Slider;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $sliders=Slider::all();
        $categories=Category::all();
        $products=Product::all();
        $favorites=Favorite::pluck('product_id')->all();
        return view('site.index',compact('sliders','categories','products','favorites'));
    }
    public function about()
    {
        return view('site.about');
    }
    public function product_detail($id)
    {
        $product=Product::find($id);
        $products=Product::all();
        $favorites=Favorite::pluck('id')->all();
        return view('site.product_detail',compact('product','products','favorites'));
    }
    public function category_detail()
    {
        return view('site.category_detail');
    }
    public function contact()
    {
        return view('site.contact');
    }
    public function product()
    {
        $products=Product::all();
        $categories=Category::all();
        $favorites=Favorite::pluck('id')->all();
        return view('site.product',compact('products','categories','favorites'));
    }
    public function cart()
    {
        $carts=Cart::all();
        return view('site.cart',compact('carts'));
    }
    public function add_to_cart(Request $request )
    {
        $request->validate([
        'product_id'=>'exists:products,id',
        'size'=>'required',
        'color'=>'required'
        ]);
        $product=Product::find($request->product_id);
        $cart=Cart::where('user_id',1)->where('product_id',$request->product_id)->first();
        if($cart){
            $cart->update([
                'quantity'=>$cart->quantity+$request->quantity,
                'color'=>$request->color,
                'size'=>$request->size
            ]);

        }else{

        Cart::create([
        'quantity'=>$request->quantity,
        'color'=>$request->color,
        'product_id'=>$request->product_id,
        'size'=>$request->size,
        'price'=>$product->price,
        'user_id'=>1
        ]);
        }
        return redirect()->back();

    }

    public function add_review(Request $request)
    {
        $request->validate([
            'product_id'=>'exists:products,id',
            'email'=>'required',
            'review'=>'required',
            'name'=>'required'
        ]);


        Review::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'review'=>$request->review,
            'product_id'=>$request->product_id,
            'user_id'=>1

        ]);

        return redirect()->back();

    }
    public function search(Request $request)
    {
        $products=Product::where('name','like','%'.$request->search.'%')->get();
        $categories=Category::all();
        return view('site.product',compact('products','categories'));
    }

    public function add_to_favorite(Request $request)
    {
        $favorite=Favorite::where('product_id',$request->product_id)->first();
        if($favorite){
            $favorite->delete();
        }else{

        Favorite::create([
            'product_id'=>$request->product_id
        ]);}
        return redirect()->back();


    }

}

