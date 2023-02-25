<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
      
        return view('frontend.pages.category', [
            "title" => "Category",
            // "blogs"  => Post::all() 

            //ini lazy loading
            //"blogs"  => Post::latest()->get()
            
            "categories"  => Category::latest()->paginate(4) // mengambil semua data dengan urutan terakhir
        ]);
    }
}
