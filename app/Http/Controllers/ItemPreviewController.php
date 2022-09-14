<?php

namespace App\Http\Controllers;

use App\Models\ItemImage;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;

class ItemPreviewController extends Controller
{
    public function Index()
    {
        $brand = Brand::all();
        $image = Image::all();
        $category = Category::all();
        $items = Item::with('itemimages')->get();
        return view('itempreview', compact('items','brand', 'category', 'image'));
    }
}
