<?php

namespace App\Http\Controllers;

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
        $images = Image::all();
        $category = Category::all();       
        $items = Item::all(); 
        return view('itempreview', compact('items','brand', 'category', 'images'));
    }
}
