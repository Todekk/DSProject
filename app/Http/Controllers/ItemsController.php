<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class ItemsController extends Controller
{
    public function Index()
    {
        $items = auth()->user()->items();        
        return view('dashboard', compact('items'));
    }
    public function Add()
    {
        return view('add');
    }
    public function Create(Request $request)
    {
        $this->validate($request, [
            'itemName' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $item = new Item();
        $item->imageName = $imageName;
        $item->path = public_path('images').DIRECTORY_SEPARATOR . $imageName;
        $item->url = "images" . DIRECTORY_SEPARATOR . $imageName;          
        $item->itemName = $request->itemName;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->user_id = auth()->user()->id;
        $item->save();
        return redirect('/dashboard')
         ->with('image',$imageName);;
    }
    public function Edit(Item $item)
    {
        if(auth()->user()->id == $item->user_id)
        {
            return view('edit', compact('item'));
        }
        else{
            return redirect('/dashboard');
        }
    }
    public function Update(Request $request, Item $item){
        if(isset($_POST['delete'])){
            unlink($item->path);
            $item->delete();
            return redirect('/dashboard');
        }
        else{
            $this->validate($request, [
            'itemName' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $item->imageName = $imageName;
            $item->path = public_path('images').DIRECTORY_SEPARATOR . $imageName;
            $item->url = "images" . DIRECTORY_SEPARATOR . $imageName;          
            $item->itemName = $request->itemName;
            $item->description = $request->description;
            $item->price = $request->price;
            $item->user_id = auth()->user()->id;
            $item->save();
            return redirect('/dashboard');
        }
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $items = DB::table('items')
            ->where('itemName', 'LIKE',  '%' . $search . '%')
            ->orWhere('.price', 'LIKE',  '%' . $search . '%')->orderBy('id', 'desc')->get();        
        return view('dashboard', compact('items'));
    }
}
