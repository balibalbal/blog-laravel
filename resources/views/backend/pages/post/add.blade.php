@extends('backend.layouts.index')
@section('isi')
  <div class="col-lg-8 mt-5 mb-5">
    <form action="/dashboard/posts" method="post" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control  @error('title') is-invalid @enderror"  id="title" name="title" autofocus required value="{{ old('title') }}">
        @error('title')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control  @error('slug') is-invalid @enderror"  id="title" name="slug" required value="{{ old('slug') }}">
        @error('slug')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select name="category_id" class="form-select" id="">
          @foreach ($categories as $category )
          @if (old('category_id') == $category->id)
          <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
          @else
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endif
          @endforeach          
        </select>
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Image Upload</label>
        <img class="img-preview img-fluid mb-3 col-sm-4">
        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
        @error('image')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">Artikel</label>
        @error('body')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
        <textarea class="form-control  @error('body') is-invalid @enderror" id="body" name="body" rows="15" required value="{{ old('body') }}"></textarea>
      </div>
      
      <button type="submit" class="btn btn-primary">Add Post</button>
    </form>
  </div>

    
<script>
  function previewImage()
  {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');
    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent)
    {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>

@endsection