<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemsController extends Controller
{
    public function index()
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
            'price' => 'required'
        ]);
        $item = new Item();
        $item->image = $request->image;
        $item->itemName = $request->itemName;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->user_id = auth()->user()->id;
        $item->save();
        return redirect('/dashboard');
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
            $item->delete();
            return redirect('/dashboard');
        }
        else{
            $this->validate($request, [
            'itemName' => 'required',
            'description' => 'required',
            'price' => 'required'
            ]);
            $item->image = $request->image;
            $item->itemName = $request->itemName;
            $item->description = $request->description;
            $item->price = $request->price;
            $item->save();
            return redirect('/dashboard');
        }
    }
}
