@extends('backend.layouts.index')
@section('isi')

<div class="card mt-3 mb-5">
  <div class="card-body">
    <h3 class="card-title">{{ $post->title }}</h3>
    <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali</a>
                <a href="/dashboard/posts/{{ $post->id }}" class="btn btn-primary"><span data-feather="edit"></span> Edit</a>
                <a href="/dashboard/posts/{{ $post->id }}" class="btn btn-danger"><span data-feather="delete"></span> Hapus</a>
    <br><br>
    @if ($post->image)
    <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top" alt="...">
    @else
    <img src="https://source.unsplash.com/600x300?{{ $post->category->name }}" class="card-img-top" alt="...">
    @endif
                <p class="card-text">{!! $post->body !!}</p>      
  </div>
</div>
    


  @endsection