<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.post.index',[
            'post' => Post::where('user_id', auth()->user()->id)->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.post.add',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;

        // baca https://laravel.com/docs/9.x/validation#quick-writing-the-validation-logic
        $validateData = $request->validate([
            'title' => 'required|min:10|max:255',
            'slug' => 'required|min:10|unique:posts',
            'category_id' => 'required',
            'image' =>'image|file|max:1024',
            'body' => 'required|min:10'
        ]);

        if($request->file('image'))
        {
            $validateData['image'] = $request->file('image')->store('img');
        }

        $validateData['user_id'] = auth()->user()->id;

        // ini baca https://laravel.com/docs/9.x/helpers#method-str-limit
        $validateData['excerpt'] = Str::limit($request->body, 200);


        Post::create($validateData);

        $request->session()->flash('success','Posting artikel berhasil');
        return redirect('/dashboard/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // return $post;
        return view('backend.pages.post.detil', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('backend.pages.post.edit',[
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // baca https://laravel.com/docs/9.x/validation#quick-writing-the-validation-logic
        $rules = [
            'title' => 'required|min:10|max:255',
            'slug' => 'required|min:10',
            //'image' =>'image|file|max:255',
            'category_id' => 'required',
            'body' => 'required|min:10'
        ];

        

        $validateData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('img');
            
        }

        
        $validateData['user_id'] = auth()->user()->id;

        // ini baca https://laravel.com/docs/9.x/helpers#method-str-limit
        $validateData['excerpt'] = Str::limit($request->body, 200);       


        Post::where('id', $post->id)->update($validateData);

        $request->session()->flash('success','Edit artikel berhasil');
        return redirect('/dashboard/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->image) {
            Storage::delete($post->image);
        }

        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success','Hapus artikel berhasil');
    }
}
