<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ItemsController extends Controller
{
    public function Index()
    {  
        $brand = Brand::all();
        $category = Category::all();       
        $items = Item::all(); 
        return view('dashboard', compact('items','brand', 'category'));
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
            'brand_id'=>'required|exists:brand,id',
            'cat_id'=>'required|exists:category,id',
            'price' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ],[
            'itemName.required' => 'Полето за име е задължително!',
            'brand_id.required' => 'Полето за марка е задължително!',
            'brand_id.exists' => 'Въвели сте грешен идентификатор!',
            'cat_id.required' => 'Полето за категория е задължително!',
            'cat_id.exists' => 'Въвели сте грешен идентификатор!',
            'description.required' => 'Полето за описание е задължително!',
            'price.required' => 'Полето за цена е задължително!',
            'image.required' => 'Задължително се избира снимка!',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $item = new Item();
        $item->imageName = $imageName;
        $item->path = public_path('images').DIRECTORY_SEPARATOR . $imageName;
        $item->url = "images" . DIRECTORY_SEPARATOR . $imageName;          
        $item->brand_id = $request->brand_id;
        $item->cat_id = $request->cat_id;
        $item->itemName = $request->itemName;
        $item->description = $request->description;
        $item->price = $request->price;
        //$item->user_id = auth()->user()->id;
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
            'brand_id'=>'required|exists:brand,id',
            'cat_id'=>'required|exists:category,id',
            'price' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ],[
                'itemName.required' => 'Полето за име е задължително!',
                'brand_id.required' => 'Полето за марка е задължително!',
                'brand_id.exists' => 'Въвели сте грешен идентификатор!',
                'cat_id.required' => 'Полето за категория е задължително!',
                 'cat_id.exists' => 'Въвели сте грешен идентификатор!',
                'description.required' => 'Полето за описание е задължително!',
                'price.required' => 'Полето за цена е задължително!',
                'image.required' => 'Задължително се избира снимка!',
            ]);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $item->imageName = $imageName;
            $item->path = public_path('images').DIRECTORY_SEPARATOR . $imageName;
            $item->url = "images" . DIRECTORY_SEPARATOR . $imageName;   
            $item->brand_id = $request->brand_id;
            $item->cat_id = $request->cat_id;       
            $item->itemName = $request->itemName;
            $item->description = $request->description;
            $item->price = $request->price;
            //$item->user_id = auth()->user()->id;
            $item->save();
            return redirect('/dashboard');
        }
    }

    public function FilterName(Request $request)
    {
        $items = DB::table('items')
            ->orderBy('itemName', 'asc')->get(); 
        return view('dashboard', compact('items'));
    }
    public function FilterPrice(Request $request)
    {
        
        $items = DB::table('items')
            ->orderBy('price', 'asc')->get(); 
        return view('dashboard', compact('items'));
    }
    public function FilterBySearch(Request $request)
    {
        
        $filterBySearch = $request->get('filterBySearch');
        $items = DB::table('items')
            ->where('price', 'LIKE', '%' .$filterBySearch.'%')
            ->orWhere('itemName', 'LIKE', '%' .$filterBySearch.'%')
            ->orderBy('price', 'asc')->get(); 
        return view('dashboard', compact('items'));
    }
}
