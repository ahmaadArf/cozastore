<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\productRequest;

class ProductController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','store']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $colors=Color::all();
        $sizes=Size::all();
        return view('admin.product.create',compact('categories','colors','sizes'));

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
            'name'=>'required',
            'price'=>'required',
            'size'=>'required',
            'color'=>'required',
            'category_id'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);


        $img_name=time().rand().$request->file('image')->getClientOriginalName();
        $request->file('image')->move('images/products',$img_name);

        $product=Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'category_id'=>$request->category_id,
            'description'=>$request->description,
            'image'=>$img_name,
        ]);
        $product->Sizes()->sync($request->size);
        $product->Colors()->sync($request->color);

        return redirect()->route('admin.products.index')->with('msg', 'Product added successfully')->with('type', 'success');

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
        $product=Product::find($id);
        $categories=Category::all();
        $productColor=$product->Colors->pluck('id')->all();
        $productSize=$product->Sizes->pluck('id')->all();
        $colors=Color::all();
        $sizes=Size::all();
        return view('admin.product.edit',compact('sizes','product','colors','categories','productColor','productSize'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(productRequest $request, $id)
    {


        $product=Product::find($id);
        $img_name=$product->image;

        if($request->image){
            $img_name=time().rand().$request->file('image')->getClientOriginalName();
            $request->file('image')->move('images/products',$img_name);
        }


        $product->update([
            'name'=>$request->name,
            'price'=>$request->price,

            'category_id'=>$request->category_id,
            'description'=>$request->description,
            'image'=>$img_name,

        ]);
        $product->Sizes()->sync($request->size);
        $product->Colors()->sync($request->color);

        return redirect()->route('admin.products.index')->with('msg', 'Product updated successfully')->with('type', 'info');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        File::delete(public_path('images/products/'.$product->image));
        return redirect()->route('admin.products.index')->with('msg', 'Product deleted successfully')->with('type', 'danger');

    }
    public function trash()
    {
        $products=Product::onlyTrashed()->get();
        return view('admin.product.trash',compact('products'));
    }
    public function restore($id)
    {
        Product::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.products.index')->with('msg', 'Product restored successfully')->with('type', 'warning');

    }
    public function forcedelete($id)
    {
        Product::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('admin.products.index')->with('msg', 'Product deleted permanintly successfully')->with('type', 'danger');

    }


}
