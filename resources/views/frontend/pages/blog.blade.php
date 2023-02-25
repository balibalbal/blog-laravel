@extends('frontend.layouts.main')

@section('isi')

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <form action="/blog">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                   
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari..." name="search" value="{{ request('search') }}">
                        <button class="btn btn-danger" type="submit">Cari</button>
                      </div>
                </form>
            </div>
        </div>
        @if ($blogs->count())
            <div class="card mb-3 mt-4">
                @if ($blogs[0]->image)
                    <img src="{{ asset('storage/'. $blogs[0]->image) }}" class="card-img-top" alt="...">
                @else
                    <img src="https://source.unsplash.com/600x300?{{ $blogs[0]->category->name }}" class="card-img-top" alt="...">
                @endif
                <div class="card-body text-center">
                    <h3 class="card-title">{{ $blogs[0]->title }}</h3>
                    <p class="card-text"><small class="text-muted"><span class="badge rounded-pill bg-info text-dark"> <a href="/blog?author={{ $blogs[0]->author->username }}"> Oleh: {{ $blogs[0]->author->name }}</a></span> | <span class="badge rounded-pill bg-warning text-dark"><a href="/blog?category={{ $blogs[0]->category->slug }}"> {{ $blogs[0]->category->name }}</a></span></small></p>
                    <p class="card-text">{{ $blogs[0]->excerpt }}</p>
                    
                    <p class="card-text"><small class="text-muted">{{ $blogs[0]->created_at->diffForHumans() }}</small></p>
                    <p><a href="/single_blog/{{ $blogs[0]->id }}" class="text-decoration-none btn btn-primary">Read More</a></p>
                </div>
            </div>
        
        




        <div class="row pt-5">
            @foreach ($blogs->skip(1) as $blog )
            <div class="col-md-3 pb-4">
                <div class="card" style="width: 18rem;">
                    @if ($blog->image)
                        <img src="{{ asset('storage/'. $blog->image) }}" class="card-img-top" alt="...">
                    @else
                        <img src="https://source.unsplash.com/600x300?{{ $blog->category->name }}" class="card-img-top" alt="...">
                    @endif
                    <div class="card-body">
                        
                        <h5 class="card-title"><a href="/single_blog/{{ $blog->id }}" class="text-decoration-none">{{ $blog->title }}</a></h5>
                        
                        <p class="card-text"><small class="text-muted"><span class="badge rounded-pill bg-info text-dark"> <a href="/blog?author={{ $blog->author->username }}"> Oleh: {{ $blog->author->name }}</a></span> | <span class="badge rounded-pill bg-warning text-dark"><a href="/blog?category={{ $blog->category->slug }}"> {{ $blog->category->name }}</a></span> | <span class="badge rounded-pill bg-success text-light">{{ $blog->created_at->diffForHumans() }}</span></small></p>
                        <p class="card-text">{{ $blog->excerpt }}</p>
                        <a href="/single_blog/{{ $blog->id }}" class="card-link">Read More</a>
                    </div>
                </div> 
            </div>           
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $blogs->links() }}
        </div>

        @else
        <div class="row justify-content-center">
            <div class="col-md-6">
                <p class="text-center fs-6">Tidak ada data</p>
            </div>
        </div>
                        
        @endif
    </div>    
@endsection
