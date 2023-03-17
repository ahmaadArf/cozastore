<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');

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
            'image'=>'required',
            'title'=>'required'
        ]);

        $img_name=time().rand().$request->file('image')->getClientOriginalName();
        $request->file('image')->move('images/categories',$img_name);

        Category::create([
            'name'=>$request->name,
            'image'=>$img_name,
            'title'=>$request->title
        ]);

        return redirect()->route('admin.categories.index')->with('msg', 'Category added successfully')->with('type', 'success');

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
        $category=Category::find($id);
        return view('admin.category.edit',compact('category'));


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

        $category=Category::find($id);
        $img_name=$category->image;

        if($request->image){
            $img_name=time().rand().$request->file('image')->getClientOriginalName();
            $request->file('image')->move('images/categories',$img_name);
        }


        $category->update([
            'name'=>$request->name,
            'image'=>$img_name,
            'title'=>$request->title,
        ]);

        return redirect()->route('admin.categories.index')->with('msg', 'Category updated successfully')->with('type', 'info');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        File::delete(public_path('images/categories/'.$category->image));
        return redirect()->route('admin.categories.index')->with('msg', 'Category deleted successfully')->with('type', 'danger');

    }
    public function trash()
    {
        $categories=Category::onlyTrashed()->get();
        return view('admin.category.trash',compact('categories'));
    }
    public function restore($id)
    {
        Category::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.categories.index')->with('msg', 'Category restored successfully')->with('type', 'warning');

    }
    public function forcedelete($id)
    {
        Category::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('admin.categories.index')->with('msg', 'Category deleted permanintly successfully')->with('type', 'danger');

    }


}
