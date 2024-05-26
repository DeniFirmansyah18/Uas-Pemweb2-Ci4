@extends('layouts.adminlayout')

@section('admin-content')
<main class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="main__title">
                    <h2>Show Movie</h2>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="original_title">Original Title</label>
                    <input type="text" class="form-control" id="original_title" value="{{ $movie->original_title }}" disabled>
                </div>
                <div class="form-group">
                    <label for="overview">Overview</label>
                    <input type="text" class="form-control" id="overview" value="{{ $movie->overview }}" disabled>
                </div>
                <div class="form-group">
                    <label for="release_date">Release Date</label>
                    <input type="date" class="form-control" id="release_date" value="{{ $movie->release_date }}" disabled>
                </div>
                <div class="form-group">
                    <label for="length">Length (minutes)</label>
                    <input type="number" class="form-control" id="length" value="{{ $movie->length }}" disabled>
                </div>
                <div class="form-group">
                    <label for="quality">Quality</label>
                    <input type="text" class="form-control" id="quality" value="{{ $movie->quality }}" disabled>
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" id="country" value="{{ $movie->country }}" disabled>
                </div>
                <div class="form-group">
                    <label for="genre">Genre</label>
                    <input type="text" class="form-control" id="genre" value="{{ $movie->genre }}" disabled>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" class="form-control" id="category" value="{{ $movie->category }}" disabled>
                </div>
                <div class="form-group">
                    <label for="created_at">Created Date</label>
                    <input type="text" class="form-control" id="created_at" value="{{ $movie->created_at }}" disabled>
                </div>
                <a href="{{ route('admin.catalog.index') }}" class="btn btn-primary">Back to Movies</a>
            </div>
        </div>
    </div>
</main>
@endsection
