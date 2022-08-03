<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image = Image::latest()->paginate(5);

        $category = Category::all();

        return view('image.index', compact('image'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('image.create', compact('category'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [

            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        
        if($request->hasfile('image'))
        {

            foreach($request->file('image') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);  
                // $data[] = $name;
                $request->image_name = $name;

                $values = array('image_name' => $name,'category_id' => $request->category_id);
                DB::table('images')->insert($values);

                // DB::insert();

            }
        }

        return redirect()->route('image.bulkupdate','category_id='.$_REQUEST['category_id'])
        ->with('success', 'Image added successfully.');
        
    }

    public function removeimage(){
        $id = $_POST['imageid'];
        $userimag = Image::where('id', $id)->firstorfail()->delete();
        return response()->json(['status' => true,'message' => 'Image Deleted Successfully!'], 200);

    }

    public function bulkupdate(Request $request){
        $category = Category::all();
        $category_id = $_REQUEST['category_id'];
        $images = Image::where(['category_id'=>$category_id])->get();
        $category = Category::where(['id'=>$category_id])->get();
        return view('image.bulkupload', compact('category','category_id','images'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
