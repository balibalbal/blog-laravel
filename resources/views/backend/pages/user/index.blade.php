@extends('backend.layouts.index')
@section('isi')


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h3 class="h4">List Users</h3>      
    </div>

    @if (session()->has('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <a href="categories/create" class="btn btn-success"><span data-feather="plus-circle"></span> Add Data</a>
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Tanggal Daftar</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user )
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td>
                <a href="/dashboard/categories/{{ $user->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/dashboard/categories/{{ $user->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/categories/{{ $user->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Yakin hapus data?')"><span data-feather="delete"></span></button>
                </form>
            </td>
          </tr>   
          @endforeach         
        </tbody>
      </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>


  @endsection