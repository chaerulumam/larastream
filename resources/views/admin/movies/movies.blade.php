@extends('admin.layouts.base')

@section('title', 'Movies')
@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Movies</h3>
        </div>
        
        <div class="card-body">
          <div class="row">
            <div class="mb-3 col-md-12">
              <a href="{{ route('admin.movie.create') }}" class="btn btn-warning">Create Movie</a>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <table id="movie" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Thumbnail</th>
                    <th>Categories</th>
                    <th>Casts</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($movie as $item)
                      <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item->title }}</td>
                      <td>
                        <img src="{{ asset('storage/thumbnail/'.$item->small_thumbnail) }}" alt="{{ $item->title }}" width="20%">
                      </td>
                      <td>{{ $item->categories }}</td>
                      <td>{{ $item->casts }}</td>
                      <td>
                        <div class="d-flex">
                          <a href="#" class="btn btn-sm btn-success">Edit</a>
                        <form action="#">
                          <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
    <script>
      $("#movie").DataTable()
    </script>
@endsection