<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function Index()
    {  
       
        $categories = Category::all();
        return view('categories', compact('categories'));
    }
    public function Create(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
            ],[
                'category_name.required' => 'Полето за име е задължително!',
            ]);
            $category = new Category();
            $category->category_name = $request->category_name;
            //$category->user_id = auth()->user()->id;
            $category->save();
            return redirect('/categories');
    }
    public function Edit(Category $category)
    {
        if(auth()->user()->id == $category->user_id)
        {
            return view('edit', compact('category'));
        }
        else{
            return redirect('/categories');
        }
    }
    public function Update(Request $request, Category $category){
        if(isset($_POST['delete'])){           
            $category->delete();
            return redirect('/categories');
        }
        else{
            $this->validate($request, [
            'category_name' => 'required',
            ],[
                'category_name.required' => 'Полето за име е задължително!',
            ]);
            $category->category_name = $request->category_name;
            $category->user_id = auth()->user()->id;
            $category->save();
            return redirect('/categories');
        }
    }
}
