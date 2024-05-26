@extends('layouts.adminlayout')

@section('admin-content')
<main class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="main__title">
                    <h2>Delete Movie</h2>
                </div>
            </div>
            <div class="col-12">
                <p>Are you sure you want to delete this movie?</p>
                <form action="{{ route('admin.catalog.destroy', $movie->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <a href="{{ route('admin.catalog.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
