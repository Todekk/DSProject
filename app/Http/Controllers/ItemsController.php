<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\ItemImage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ItemsController extends Controller
{
    public function Index(Request $request)
    {

        $brands = Brand::all();
        $images = Image::all();
        $categories = Category::withCount('Item')->get();
        $items = Item::paginate(10);
        $count = Item::all()
            ->where('isFavourite' , '=', '1');
        return view('dashboard', compact('items','brands', 'categories', 'images', 'count'));
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
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ],[
            'itemName.required' => 'Полето за име е задължително!',
            'brand_id.required' => 'Полето за марка е задължително!',
            'brand_id.exists' => 'Въвели сте грешен идентификатор!',
            'cat_id.required' => 'Полето за категория е задължително!',
            'cat_id.exists' => 'Въвели сте грешен идентификатор!',
            'description.required' => 'Полето за описание е задължително!',
            'price.required' => 'Полето за цена е задължително!',
            'image.required' => 'Задължително се избира снимка!',
            'photo.required' => 'Задължително се избира снимка!',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('allimages'), $imageName);

        $photo_name = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('secondimages'), $photo_name);

        $iimage = new Image();
        $iimage->imageName = $imageName;
        $iimage->path = public_path('allimages').DIRECTORY_SEPARATOR . $imageName;
        $iimage->url = "allimages" . DIRECTORY_SEPARATOR . $imageName;
        //$item->user_id = auth()->user()->id;
        $iimage->save();


        $item = new Item();
        $item->mainimage_id = $iimage->id;
        $item->brand_id = $request->brand_id;
        $item->cat_id = $request->cat_id;
        $item->itemName = $request->get('itemName');
        $item->description = $request->description;
        $item->price = $request->price;
        //$item->user_id = auth()->user()->id;
        $item->save();


        $photo = new ItemImage();
        $photo->item_id = $item->id;
        $photo->photo_name = $photo_name;
        $photo->photopath = public_path('secondimages').DIRECTORY_SEPARATOR . $photo_name;
        $photo->photourl = "secondimages" . DIRECTORY_SEPARATOR .$photo_name;
        //$item->user_id = auth()->user()->id;
        $photo->save();





        return redirect('/dashboard')->with('image',$imageName);
    }

    public function Update(Request $request, Item $item, Image $iimage){
        if(isset($_POST['delete'])){;
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
            ],[
                'itemName.required' => 'Полето за име е задължително!',
                'brand_id.required' => 'Полето за марка е задължително!',
                'brand_id.exists' => 'Въвели сте грешен идентификатор!',
                'cat_id.required' => 'Полето за категория е задължително!',
                 'cat_id.exists' => 'Въвели сте грешен идентификатор!',
                'description.required' => 'Полето за описание е задължително!',
                'price.required' => 'Полето за цена е задължително!',
            ]);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('allimages'), $imageName);

            $iimage->imageName = $imageName;
            $iimage->path = public_path('allimages').DIRECTORY_SEPARATOR . $imageName;
            $iimage->url = "allimages" . DIRECTORY_SEPARATOR . $imageName;
            //$item->user_id = auth()->user()->id;
            $iimage->save();

            $item->brand_id = $request->brand_id;
            $item->mainimage_id = $iimage->id;
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
        $count = Item::all()
            ->where('isFavourite' , '=', '1');
        $brands = Brand::all();
        $images = Image::all();
        $categories = Category::withCount('Item')->get();
        $items = Item::with('brand', 'category', 'image')
            ->orderBy('itemName', 'asc')->paginate(10);
            return view('dashboard', compact('items','brands', 'categories', 'images', 'count'));
    }
    public function FilterPrice(Request $request)
    {
        $count = Item::all()
            ->where('isFavourite' , '=', '1');
        $brands = Brand::all();
        $images = Image::all();
        $categories = Category::withCount('Item')->get();
        $items = Item::with('brand', 'category', 'image')
            ->orderBy('price', 'asc')->paginate(10);
        return view('dashboard', compact('items','brands', 'categories', 'images', 'count'));
    }
    public function FilterBySearch(Request $request)
    {
        $brands = Brand::all();
        $images = Image::all();
        $categories = Category::withCount('Item')->get();
        $filterBySearch = $request->get('filterBySearch');
        $count = Item::all()
            ->where('isFavourite' , '=', '1');
        $items = Item::with('brand', 'category', 'image')
            ->join('brand', 'items.brand_id', '=' , 'brand.id')
            ->join('category', 'items.cat_id', '=' , 'category.id')
            ->where('price', 'LIKE', '%' .$filterBySearch.'%')
            ->orWhere('itemName', 'LIKE', '%' .$filterBySearch.'%')
            ->orWhere('category.category_name', 'LIKE', '%' .$filterBySearch.'%')
            ->orWhere('brand.brand_name', 'LIKE', '%' .$filterBySearch.'%')
            ->orderBy('price', 'asc')->paginate(10);
            return view('dashboard', compact('items','brands', 'categories', 'images', 'count'));
    }
    public function FilterByFavourite(Request $request)
    {
        $brands = Brand::all();
        $images = Image::all();
        $categories = Category::withCount('Item')->get();
        $items = Item::with('brand', 'category', 'image')
            ->where('isFavourite',true)
            ->orderBy('price', 'asc')->paginate(10);
        $count = Item::all()
            ->where('isFavourite' , '=', '1');
        return view('dashboard', compact('items','brands', 'categories', 'images', 'count'));
    }

    public function SaveFavourite(Request $request, Item $item){
        $item -> update(['isFavourite'=> !$item->isFavourite]);
        return redirect('dashboard');
        /*if($isFavourite == true){
            //$sessionRequest = Session::push('items.id', $favourite);

        }*/
        //$sessionRequest = Session::push('Favourites', $favourite);

    }

     public function filterByCategory(Request $request)
     {
         $count = Item::all()
             ->where('isFavourite' , '=', '1');
             $brands = Brand::all();
             $images = Image::all();
             $categories = Category::withCount('Item')->get();
             $categoryFilter = $request->input('category_name');
             $items = Item::with('brand', 'category', 'image')
                 ->join('category', 'items.cat_id', '=' , 'category.id')
                 ->where('category.category_name', 'LIKE', '%' .$categoryFilter.'%')->paginate(10);
             return view('/dashboard', compact('categoryFilter', 'items','brands', 'categories', 'images', 'count'));


     }
}
