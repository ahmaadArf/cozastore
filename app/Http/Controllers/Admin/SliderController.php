<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');

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
            'title'=>'required',
        ]);

        $img_name=time().rand().$request->file('image')->getClientOriginalName();
        $request->file('image')->move('images/sliders',$img_name);

        Slider::create([
            'name'=>$request->name,
            'image'=>$img_name,
            'title'=>$request->title,
        ]);

        return redirect()->route('admin.sliders.index')->with('msg', 'Slider added successfully')->with('type', 'success');

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
        $slider=Slider::find($id);
        return view('admin.slider.edit',compact('slider'));


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

        $slider=Slider::find($id);
        $img_name=$slider->image;

        if($request->image){
            $img_name=time().rand().$request->file('image')->getClientOriginalName();
            $request->file('image')->move('images/sliders',$img_name);
        }


        $slider->update([
            'name'=>$request->name,
            'image'=>$img_name,
            'title'=>$request->title

        ]);

        return redirect()->route('admin.sliders.index')->with('msg', 'Slider updated successfully')->with('type', 'info');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider=Slider::find($id);
        $slider->delete();
        File::delete(public_path('images/sliders/'.$slider->image));
        return redirect()->route('admin.sliders.index')->with('msg', 'Slider deleted successfully')->with('type', 'danger');

    }
    public function trash()
    {
        $sliders=Slider::onlyTrashed()->get();
        return view('admin.slider.trash',compact('sliders'));
    }
    public function restore($id)
    {
        Slider::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.sliders.index')->with('msg', 'Slider restored successfully')->with('type', 'warning');

    }
    public function forcedelete($id)
    {
        Slider::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('admin.sliders.index')->with('msg', 'Slider deleted permanintly successfully')->with('type', 'danger');

    }


}
