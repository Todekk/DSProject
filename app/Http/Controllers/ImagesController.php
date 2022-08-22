<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImagesController extends Controller
{
    public function Index()
    {  
        $images = Image::all();
        return view('images', compact('images'));
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
        $request->image->move(public_path('images'), $imageName);

        $item = new Image();
        $item->imageName = $imageName;
        $item->path = public_path('images').DIRECTORY_SEPARATOR . $imageName;
        $item->url = "images" . DIRECTORY_SEPARATOR . $imageName; 
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
        else{
            $this->validate($request, [
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
            ],[
                'image.required' => 'Задължително се избира снимка!'
            ]);
            $ $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
    
            $image = new Image();
            $image->imageName = $imageName;
            $image->path = public_path('images').DIRECTORY_SEPARATOR . $imageName;
            $image->url = "images" . DIRECTORY_SEPARATOR . $imageName;
            $image->user_id = auth()->user()->id;
            $image->save();
            return redirect('/images');
        }
    }
}
