<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductImageController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:productImage-list|productImage-create|productImage-edit|productImage-delete', ['only' => ['index','store']]);
         $this->middleware('permission:productImage-create', ['only' => ['create','store']]);
         $this->middleware('permission:productImage-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:productImage-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productImages=ProductImage::all();
        return view('admin.productImage.index',compact('productImages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=Product::all();
        return view('admin.productImage.create',compact('products'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'path'=>'required',
            'product_id'=>'required',
        ]);

        $img_name=time().rand().$request->file('path')->getClientOriginalName();
        $request->file('path')->move('images/productImages',$img_name);

        ProductImage::create([
            'path'=>$img_name,
            'product_id'=>$request->product_id,
        ]);

        return redirect()->route('admin.productImages.index')->with('msg', 'ProductImage added successfully')->with('type', 'success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productImage=ProductImage::find($id);
        return view('admin.productImage.edit',compact('productImage'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'title'=>'required'
        ]);

        $productImage=ProductImage::find($id);
        $img_name=$productImage->image;

        if($request->image){
            $img_name=time().rand().$request->file('image')->getClientOriginalName();
            $request->file('image')->move('images/productImages',$img_name);
        }


        $productImage->update([
            'name'=>$request->name,
            'image'=>$img_name,
            'title'=>$request->title

        ]);

        return redirect()->route('admin.productImages.index')->with('msg', 'ProductImage updated successfully')->with('type', 'info');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productImage=ProductImage::find($id);
        $productImage->delete();
        File::delete(public_path('images/productImages/'.$productImage->image));
        return redirect()->route('admin.productImages.index')->with('msg', 'ProductImage deleted successfully')->with('type', 'danger');

    }



}
