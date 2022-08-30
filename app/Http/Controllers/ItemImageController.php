<?php

namespace App\Http\Controllers;

use App\Models\ItemImage;
use Illuminate\Http\Request;

class ItemImageController extends Controller
{
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
        $image_name = time().'.'.$request->image->extension();
        $request->image->move(public_path('allimages'), $image_name);

        $item = new ItemImage();
        $item->item_id = $request->item_id;
        $item->image_name = $image_name;
        $item->path = public_path('allimages').DIRECTORY_SEPARATOR . $image_name;
        $item->url = "allimages" . DIRECTORY_SEPARATOR .$image_name;
        //$item->user_id = auth()->user()->id;
        $item->save();
        return redirect('/images')
            ->with('image',$image_name);;
    }
    public function Update(Request $request, ItemImage $image){
        if(isset($_POST['delete'])){
            unlink($image->path);
            $image->delete();
            return redirect('/images');
        }
    }
}
