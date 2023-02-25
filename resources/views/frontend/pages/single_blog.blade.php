@extends('frontend.layouts.main')

@section('isi')

<div class="container">
    <div class="card mt-3">
        <div class="card-body">
          <h5 class="card-title">{{ $blog->title }}</h5>
          {{-- variabel $blog diambil dari post controller yang sudah berisi data --}}
          <p class="card-text"><small class="text-muted"><span class="badge rounded-pill bg-info text-dark">Oleh: {{ $blog->author->name }}</span> | <span class="badge rounded-pill bg-warning text-dark"><a href="/blog?category={{ $blog->category->slug }}"> {{ $blog->category->name }}</a></span></small></p>
          <p class="card-text">{!! $blog->body !!}</p>      
        </div>
      </div>
</div>

@endsection