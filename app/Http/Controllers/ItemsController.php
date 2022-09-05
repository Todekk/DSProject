<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ItemsController extends Controller
{
    public function Index()
    {

        $brands = Brand::all();
        $images = Image::all();
        $categories = Category::all();
        $items = Item::paginate(10);
        return view('dashboard', compact('items','brands', 'categories', 'images'));
    }
    public function Add()
    {
        return view('add');
    }
    public function Create(Request $request)
    {
        $this->validate($request, [
            'itemName' => 'required',
            'mainimage_id' => 'required|exists:images,id',
            'description' => 'required',
            'brand_id'=>'required|exists:brand,id',
            'cat_id'=>'required|exists:category,id',
            'price' => 'required',
        ],[
            'itemName.required' => 'Полето за име е задължително!',
            'mainimage_id.required' => 'Полето за главна снимка е задължително!',
            'mainimage_id.exists' => 'Въвели сте грешен идентификатор!',
            'brand_id.required' => 'Полето за марка е задължително!',
            'brand_id.exists' => 'Въвели сте грешен идентификатор!',
            'cat_id.required' => 'Полето за категория е задължително!',
            'cat_id.exists' => 'Въвели сте грешен идентификатор!',
            'description.required' => 'Полето за описание е задължително!',
            'price.required' => 'Полето за цена е задължително!',
        ]);

        $item = new Item();
        $item->mainimage_id = $request->mainimage_id;
        $item->brand_id = $request->brand_id;
        $item->cat_id = $request->cat_id;
        $item->itemName = $request->get('itemName');
        $item->description = $request->description;
        $item->price = $request->price;
        //$item->user_id = auth()->user()->id;
        $item->save();


        return response()->json(['success'=>'Successfully']);
    }

    public function Update(Request $request, Item $item){
        if(isset($_POST['delete'])){;
            $item->delete();
            return redirect('/dashboard');
        }
        else{
            $this->validate($request, [
            'itemName' => 'required',
            'mainimage_id' => 'required|exists:images,id',
            'description' => 'required',
            'brand_id'=>'required|exists:brand,id',
            'cat_id'=>'required|exists:category,id',
            'price' => 'required',
            ],[
                'itemName.required' => 'Полето за име е задължително!',
                'mainimage_id.required' => 'Полето за главна снимка е задължително!',
                'mainimage_id.exists' => 'Въвели сте грешен идентификатор!',
                'brand_id.required' => 'Полето за марка е задължително!',
                'brand_id.exists' => 'Въвели сте грешен идентификатор!',
                'cat_id.required' => 'Полето за категория е задължително!',
                 'cat_id.exists' => 'Въвели сте грешен идентификатор!',
                'description.required' => 'Полето за описание е задължително!',
                'price.required' => 'Полето за цена е задължително!',
            ]);

            $item->brand_id = $request->brand_id;
            $item->cat_id = $request->cat_id;
            $item->mainimage_id = $request->mainimage_id;
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
        $brands = Brand::all();
        $images = Image::all();
        $categories = Category::all();
        $items = Item::with('brand', 'category', 'image')
            ->orderBy('itemName', 'asc')->paginate(10);
            return view('dashboard', compact('items','brands', 'categories', 'images'));
    }
    public function FilterPrice(Request $request)
    {
        $brands = Brand::all();
        $images = Image::all();
        $categories = Category::all();
        $items = Item::with('brand', 'category', 'image')
            ->orderBy('price', 'asc')->paginate(10);
        return view('dashboard', compact('items','brands', 'categories', 'images'));
    }
    public function FilterBySearch(Request $request)
    {
        $brands = Brand::all();
        $images = Image::all();
        $categories = Category::all();
        $filterBySearch = $request->get('filterBySearch');

        $items = Item::with('brand', 'category', 'image')
            ->join('brand', 'items.brand_id', '=' , 'brand.id')
            ->join('category', 'items.cat_id', '=' , 'category.id')
            ->where('price', 'LIKE', '%' .$filterBySearch.'%')
            ->orWhere('itemName', 'LIKE', '%' .$filterBySearch.'%')
            ->orWhere('category.category_name', 'LIKE', '%' .$filterBySearch.'%')
            ->orWhere('brand.brand_name', 'LIKE', '%' .$filterBySearch.'%')
            ->orderBy('price', 'asc')->paginate(10);
            return view('dashboard', compact('items','brands', 'categories', 'images'));
    }
    public function FilterByFavourite(Request $request)
    {
        $brands = Brand::all();
        $images = Image::all();
        $categories = Category::all();
        $items = Item::with('brand', 'category', 'image')
            ->where('isFavourite',true)
            ->orderBy('price', 'asc')->paginate(10);
        return view('dashboard', compact('items','brands', 'categories', 'images'));
    }

    public function SaveFavourite(Request $request, Item $item){
        $item -> update(['isFavourite'=> !$item->isFavourite]);
        return redirect('dashboard');
        /*if($isFavourite == true){
            //$sessionRequest = Session::push('items.id', $favourite);

        }*/
        //$sessionRequest = Session::push('Favourites', $favourite);

    }
    public function AddFavourite(Request $request){

        $request = Session::push('items.id', 'Favourite');
    }
    public function AccessSession(Request $request){
        //$request = Session::all([]);
        dd(Session::get('items.id'));

    }
    public function DeleteFavourite(Request $request) {
        $request->session()->forget('Favourites');
        echo "Data has been removed from session.";
     }
     public function filterByCategory(Request $request)
     {
             $brands = Brand::all();
             $images = Image::all();
             $categories = Category::all();
             $categoryFilter = $request->input('category_name');
             $items = Item::with('brand', 'category', 'image')
                 ->join('category', 'items.cat_id', '=' , 'category.id')
                 ->where('category.category_name', 'LIKE', '%' .$categoryFilter.'%')
                 ->orderBy('price', 'asc')->paginate(10);
             return view('/dashboard', compact('categoryFilter', 'items','brands', 'categories', 'images'));


     }
}
