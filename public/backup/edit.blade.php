@extends('layouts.adminlayout')

@section('admin-content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Movie</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        html, body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
            background: #121212;
            color: #ffffff;
        }

        ::selection {
            background: #4158d0;
            color: #fff;
        }

        .wrapper {
            width: 100%;
            max-width: 1500px;
            position: center;
            margin-left: 270px;
            background: #1f1f1f;
            border-radius: 15px;
            box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.5);
        }

        .wrapper .title {
            font-size: 35px;
            font-weight: 600;
            text-align: center;
            line-height: 100px;
            color: #fff;
            user-select: none;
            border-radius: 15px 15px 0 0;
            background: linear-gradient(-135deg, #0066ff, #0056b3);
        }

        .wrapper form {
            padding: 30px 30px 50px 30px;
        }

        .wrapper form .field {
            height: 50px;
            width: 100%;
            margin-top: 40px;
            position: relative;
        }

        .wrapper form .field input,
        .wrapper form .field select {
            height: 100%;
            width: 100%;
            outline: none;
            font-size: 17px;
            padding-left: 20px;
            border: 1px solid #444;
            border-radius: 25px;
            background: #2c2c2c;
            color: #ffffff;
            transition: all 0.3s ease;
        }

        .wrapper form .field input:focus,
        .wrapper form .field select:focus {
            border-color: #0066ff;
            background: #1f1f1f;
        }

        .wrapper form .field label {
            position: absolute;
            top: 50%;
            left: 20px;
            color: #ffffff;
            font-weight: 400;
            font-size: 17px;
            pointer-events: none;
            transform: translateY(-50%);
            transition: all 0.3s ease;
        }

        .wrapper form .field input:focus ~ label,
        .wrapper form .field input:valid ~ label,
        .wrapper form .field select:focus ~ label,
        .wrapper form .field select:valid ~ label {
            top: 0%;
            font-size: 16px;
            color: #0066ff;
            background: #1f1f1f;
            transform: translateY(-50%);
        }

        .wrapper form .field input[type="date"] {
            padding-left: 20px;
            padding-right: 20px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background: #2c2c2c;
            color: #ffffff;
            border: 1px solid #444;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .wrapper form .field input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
        }

        .wrapper form .field input[type="submit"] {
            color: #fff;
            border: none;
            padding-left: 0;
            margin-top: -10px;
            font-size: 20px;
            font-weight: 500;
            cursor: pointer;
            background: linear-gradient(-135deg, #0066ff, #0056b3);
            transition: all 0.3s ease;
        }

        .wrapper form .field input[type="submit"]:active {
            transform: scale(0.95);
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="title">
            Edit Movie
        </div>
        <form action="{{ route('admin.catalog.update', $movie->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="field">
                <input type="text" id="original_title" name="original_title" value="{{ $movie->original_title }}" required>
                <label for="original_title">Original Title</label>
            </div>
            <div class="field">
                <input type="text" id="overview" name="overview" value="{{ $movie->overview }}" required>
                <label for="overview">Overview</label>
            </div>
            <div class="field">
                <input type="date" id="release_date" name="release_date" value="{{ $movie->release_date }}" required>
                <label for="release_date">Release Date</label>
            </div>
            <div class="field">
                <input type="number" id="length" name="length" value="{{ $movie->length }}" required>
                <label for="length">Length (minutes)</label>
            </div>
            <div class="field">
                <input type="text" id="quality" name="quality" value="{{ $movie->quality }}" required>
                <label for="quality">Quality</label>
            </div>
            <div class="field">
                <input type="text" id="country" name="country" value="{{ $movie->country }}" required>
                <label for="country">Country</label>
            </div>
            <div class="field">
                <input type="text" id="genre" name="genre" value="{{ $movie->genre }}" required>
                <label for="genre">Genre</label>
            </div>
            <div class="field">
                <input type="text" id="category" name="category" value="{{ $movie->category }}" required>
                <label for="category">Category</label>
            </div>
            <div class="field">
                <input type="file" id="poster_path" name="poster_path" required>
                <label for="poster_path">Poster Path</label>
            </div>
            <div class="field">
                <input type="file" id="backdrop_path" name="backdrop_path" required>
                <label for="backdrop_path">Backdrop Path</label>
            </div>
            <div class="field">
                <input type="submit" value="Update Movie">
            </div>
        </form>
    </div>
</body>
</html>

@endsection
