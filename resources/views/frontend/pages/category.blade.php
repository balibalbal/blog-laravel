@extends('frontend.layouts.main')

@section('isi')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mt-5 mb-5">
                @foreach ($categories as $category )
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <h5><a href="/blog?category={{ $category->slug }}" class="text-decoration-none">{{ $category->name }}</a></h5>
                        <span class="badge bg-primary rounded-pill">14</span>
                        </li><br>
                    </ul>
                @endforeach    
            </div>  
        </div>

        <div class="row">
            <div class="d-flex justify-content-center">
                {{ $categories->links() }}
            </div>
        </div>
         
    </div>
@endsection
