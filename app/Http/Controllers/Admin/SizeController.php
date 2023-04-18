<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SizeController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:size-list|size-create|size-edit|size-delete', ['only' => ['index','store']]);
         $this->middleware('permission:size-create', ['only' => ['create','store']]);
         $this->middleware('permission:size-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:size-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes=Size::all();
        return view('admin.size.index',compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.size.create');

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
        ]);

        Size::create([
            'name'=>$request->name,
        ]);
        return redirect()->route('admin.sizes.index')->with('msg', 'Size added successfully')->with('type', 'success');

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
        $size=Size::find($id);
        return view('admin.size.edit',compact('size'));


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
        ]);

        $size=Size::find($id);

        $size->update([
            'name'=>$request->name,
        ]);

        return redirect()->route('admin.sizes.index')->with('msg', 'Size updated successfully')->with('type', 'info');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $size=Size::find($id);
        $size->delete();
        return redirect()->route('admin.sizes.index')->with('msg', 'Size deleted successfully')->with('type', 'danger');

    }
    public function trash()
    {
        $sizes=Size::onlyTrashed()->get();
        return view('admin.size.trash',compact('sizes'));
    }
    public function restore($id)
    {
        Size::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.sizes.index')->with('msg', 'Size restored successfully')->with('type', 'warning');

    }
    public function forcedelete($id)
    {
        Size::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('admin.sizes.index')->with('msg', 'Size deleted permanintly successfully')->with('type', 'danger');

    }


}
