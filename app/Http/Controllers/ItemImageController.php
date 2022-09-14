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
        $photo_name = time().'.'.$request->image->extension();
        $request->image->move(public_path('secondimages'), $photo_name);

        $photo = new ItemImage();
        $photo->item_id = $request->item_id;
        $photo->photo_name = $photo_name;
        $photo->photopath = public_path('secondimages').DIRECTORY_SEPARATOR . $photo_name;
        $photo->photourl = "secondimages" . DIRECTORY_SEPARATOR .$photo_name;
        //$item->user_id = auth()->user()->id;
        $photo->save();
        return redirect('/dashboard');
    }
    public function Update(Request $request, ItemImage $photo){
        if(isset($_POST['delete'])){
            unlink($photo->photopath);
            $photo->delete();
            return redirect('/dashboard');
        }
    }
}
