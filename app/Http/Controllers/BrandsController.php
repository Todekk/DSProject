<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandsController extends Controller
{
    public function Index()
    {  
       
        $brands = Brand::all();
        return view('brands', compact('brands'));
    }
    public function Create(Request $request)
    {
        $this->validate($request, [
            'brand_name' => 'required',
            ],[
                'brand_name.required' => 'Полето за име е задължително!',
            ]);
            $brand = new Brand();
            $brand->brand_name = $request->brand_name;
            $brand->save();
            return redirect('/brands');
    }
    public function Edit(Brand $brand)
    {
        if(auth()->user()->id == $brand->user_id)
        {
            return view('edit', compact('brand'));
        }
        else{
            return redirect('/brands');
        }
    }
    public function Update(Request $request, Brand $brand){
        if(isset($_POST['delete'])){           
            $brand->delete();
            return redirect('/brands');
        }
        else{
            $this->validate($request, [
            'brand_name' => 'required',
            ],[
                'brand_name.required' => 'Полето за име е задължително!',
            ]);
            $brand->brand_name = $request->brand_name;
            $brand->save();
            return redirect('/brands');
        }
    }
}
