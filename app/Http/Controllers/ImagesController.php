<?php

namespace App\Http\Controllers;

use App\Models\ItemImage;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Item;

class ImagesController extends Controller
{
    public function Index()
    {
        $item = Item::all();
        $itemimages = ItemImage::all();
        $images = Image::all();
        return view('images', compact('images', 'itemimages', 'item'));
    }
    public function Add()
    {
        return view('add');
    }
    public function Create(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ],[
            'image.required' => 'Задължително се избира снимка!',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('allimages'), $imageName);

        $item = new Image();
        $item->imageName = $imageName;
        $item->path = public_path('allimages').DIRECTORY_SEPARATOR . $imageName;
        $item->url = "allimages" . DIRECTORY_SEPARATOR . $imageName;
        //$item->user_id = auth()->user()->id;
        $item->save();
        return redirect('/images')
         ->with('image',$imageName);;
    }
    public function Edit(Image $image)
    {
        if(auth()->user()->id == $image->user_id)
        {
            return view('edit', compact('image'));
        }
        else{
            return redirect('/images');
        }
    }
    public function Update(Request $request, Image $image){
        if(isset($_POST['delete'])){
            unlink($image->path);
            $image->delete();
            return redirect('/images');
        }
    }
}
