@extends('layouts.adminlayout')

@section('admin-content')
<!-- main content -->
<main class="main">
    <div class="container-fluid">
        <div class="row">
            <!-- main title -->
            <div class="col-12">
                <div class="main__title">
                    <h2>Edit Movie</h2>
                </div>
            </div>
            <!-- end main title -->

            <!-- form -->
            <div class="col-12">
                <form action="{{ route('admin.catalog.update', $movie->id) }}" method="POST" class="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12 col-md-5 form__cover">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-12">
                                    <div class="form__img">
                                        <label for="form__img-upload">Upload Poster</label>
                                        <input id="form__img-upload" name="poster_path" type="file" accept=".png, .jpg, .jpeg">
                                        <img id="form__img" src="#" alt=" ">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-7 form__content">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form__group">
                                        <input name="original_title" id="original_title" type="text" class="form__input" placeholder="Title" value="{{ $movie->original_title }}" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form__group">
                                        <textarea id="overview" name="overview" type="text" class="form__textarea" placeholder="Description" required>{{ $movie->overview }}</textarea>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="form__group">
                                        <input id="release_date" name="release_date" type="text" class="form__input" placeholder="Release year" value="{{ $movie->release_date }}" required>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="form__group">
                                        <input name="length" id="length" type="text" class="form__input" placeholder="Running time in minutes" value="{{ $movie->length }}" required>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="form__group">
                                        <select class="js-example-basic-single" id="quality" name="quality" required>
                                            <option value="FullHD" @if($movie->quality == 'FullHD') selected @endif>FullHD</option>
                                            <option value="HD" @if($movie->quality == 'HD') selected @endif>HD</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <div class="form__group">
                                        <input name="country" type="text" class="form__input" placeholder="Country" value="{{ $movie->country }}" required>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <div class="form__group">
                                        <select class="js-example-basic-multiple" id="genre" name="genre[]" multiple="multiple" required>
                                            <option value="Action" @if(in_array('Action', explode(',', $movie->genre))) selected @endif>Action</option>
                                            <option value="Animation" @if(in_array('Animation', explode(',', $movie->genre))) selected @endif>Animation</option>
                                            <option value="Comedy" @if(in_array('Comedy', explode(',', $movie->genre))) selected @endif>Comedy</option>
                                            <option value="Crime" @if(in_array('Crime', explode(',', $movie->genre))) selected @endif>Crime</option>
                                            <option value="Drama" @if(in_array('Drama', explode(',', $movie->genre))) selected @endif>Drama</option>
                                            <option value="Fantasy" @if(in_array('Fantasy', explode(',', $movie->genre))) selected @endif>Fantasy</option>
                                            <option value="Historical" @if(in_array('Historical', explode(',', $movie->genre))) selected @endif>Historical</option>
                                            <option value="Horror" @if(in_array('Horror', explode(',', $movie->genre))) selected @endif>Horror</option>
                                            <option value="Romance" @if(in_array('Romance', explode(',', $movie->genre))) selected @endif>Romance</option>
                                            <option value="SciFi" @if(in_array('SciFi', explode(',', $movie->genre))) selected @endif>Science-fiction</option>
                                            <option value="Thriller" @if(in_array('Thriller', explode(',', $movie->genre))) selected @endif>Thriller</option>
                                            <option value="Western" @if(in_array('Western', explode(',', $movie->genre))) selected @endif>Western</option>
                                            <option value="Other" @if(in_array('Other', explode(',', $movie->genre))) selected @endif>Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form__gallery">
                                        <label id="gallery1" for="form__gallery-upload">Upload Backdrop</label>
                                        <input data-name="#gallery1" id="form__gallery-upload" name="backdrop_path" class="form__gallery-upload" type="file" accept=".png, .jpg, .jpeg" multiple>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="form__group">
                                <select id="category" name="category" class="form__input" required>
                                    <option value="Movie" @if($movie->category == 'Movie') selected @endif>Movie</option>
                                    <option value="TV Series" @if($movie->category == 'TV Series') selected @endif>TV Series</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form__video">
                                        <label id="video" for="form__video-upload">Upload video</label>
                                        <input name="video" data-name="#movie1" id="form__video-upload" class="form__video-upload" type="file" accept="video/mp4,video/x-m4v,video/*">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <div class="form__group form__group--link">
                                        <input id="video" name="video" type="text" class="form__input" placeholder="or add a link">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="form__btn">Update Movie</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end form -->
        </div>
    </div>
</main>
<!-- end main content -->
@endsection
