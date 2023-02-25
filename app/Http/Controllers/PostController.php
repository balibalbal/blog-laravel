<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;

class PostController extends Controller
{
    public function index()
    {       
        return view('frontend.pages.blog', [
            "title" => "Daftar Postingan",
            // "blogs"  => Post::all() 

            //ini lazy loading
            //"blogs"  => Post::latest()->get()
            
            //setelah dirubah menjadi eager loading akan manggil $with di model post
            "blogs"  => Post::latest()->filter(request(['search', 'category','author']))->paginate(13)->withQueryString()
        ]);
    }

    public function show($slug)
    {
        return view('frontend.pages.single_blog', [
            "title" => "Single Blog",
            "blog"  => Post::find($slug) //variabel blog yang sudah berisi query akan dikirim ke view single_blog
        ]);
    }
}
