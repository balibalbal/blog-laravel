@include('backend.layouts.navbar')

<div class="container-fluid">
  <div class="row">
    @include('backend.layouts.sidebar')
    
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      @yield('isi')
    </main>
  </div>
</div>


@include('backend.layouts.footer')
