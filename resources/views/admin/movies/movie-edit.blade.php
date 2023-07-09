@extends('admin.layouts.base')

@section('title', 'Edit')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Movie</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form enctype="multipart/form-data" method="POST" action="{{ route('admin.movie.update', $movie->id) }}">
        @method('put')
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $movie->title }}" placeholder="e.g Guardian of The Galaxy">
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group">
            <label for="trailer">Trailer</label>
            <input type="text" class="form-control @error('trailer') is-invalid @enderror" id="trailer" name="trailer" value="{{ $movie->trailer }}" placeholder="Video url">
             @error('trailer')
                <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group">
            <label for="movie">Movie</label>
            <input type="text" class="form-control @error('movie') is-invalid @enderror" id="movie" name="movie" value="{{ $movie->movie }}" placeholder="Video url">
             @error('movie')
                <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group">
            <label for="duration">Duration</label>
            <input type="text" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" value="{{ $movie->duration }}" placeholder="1h 39m">
             @error('duration')
                <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group">
            <label>Date:</label>
            <div class="input-group date" id="release-date" data-target-input="nearest">
              <input type="text" name="release_date" class="form-control datetimepicker-input @error('release_date') is-invalid @enderror" value="{{ $movie->release_date }}" data-target="#release-date"/>
              <div class="input-group-append" data-target="#release-date" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
            @error('release_date')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
          </div>
          <div class="form-group">
            <label for="casts">Casts</label>
            <input type="text" class="form-control @error('casts') is-invalid @enderror" id="casts" name="casts" value="{{ $movie->casts }}" placeholder="Jackie Chan">
             @error('casts')
                <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group">
            <label for="categories">Categories</label>
            <input type="text" class="form-control @error('categories') is-invalid @enderror" id="categories" name="categories" value="{{ $movie->categories }}" placeholder="Action, Fantasy">
             @error('categories')
                <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group">
            <label for="small_thumbnail">Small Thumbnail</label>
            <input type="file" class="form-control @error('small_thumbnail') is-invalid @enderror" name="small_thumbnail" value="{{ $movie->small_thumbnail }}">
             @error('small_thumbnail')
                <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group">
            <label for="large_thumbnail">Large Thumbnail</label>
            <input type="file" class="form-control @error('large_thumbnail') is-invalid @enderror" name="large_thumbnail" value="{{ $movie->large_thumbnail }}">
             @error('large_thumbnail')
                <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group">
            <label for="short_about">Short About</label>
            <input type="text" class="form-control @error('short_about') is-invalid @enderror" id="short_about" name="short_about" value="{{ $movie->short_about }}" placeholder="Awesome Movie">
            @error('short_about')
                <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group">
            <label for="about">About</label>
            <input type="text" class="form-control @error('about') is-invalid @enderror" id="about" name="about" value="{{ $movie->about }}" placeholder="Awesome Movie">
            @error('about')
                <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group">
            <label>Featured</label>
            <select class="custom-select" name="featured">
              <option value="0" {{ old( $movie->featured == '0' ? 'selected' : '') }}>No</option>
              <option value="1" {{ old( $movie->featured == '1' ? 'selected' : '') }}>Yes</option>
            </select>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>    
@endsection

@section('js')
    <script>
      $('#release-date').datetimepicker({
        format: 'YYYY-MM-DD'
      })
    </script>
@endsection
