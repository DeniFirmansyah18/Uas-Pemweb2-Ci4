@extends('layouts.adminlayout')

@section('admin-content')
<main class="main">
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: 'Poppins', sans-serif;
        }

        .container-fluid {
            padding: 20px;
        }

        .main__title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .main__title h2 {
            font-size: 24px;
            font-weight: 600;
        }

        .main__title-stat {
            font-size: 14px;
            color: #bbbbbb;
        }

        .main__title-wrap {
            display: flex;
            align-items: center;
        }

        .main__title-link {
            background-color: #0066ff;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .main__title-link:hover {
            background-color: #0056b3;
        }

        .main__table-wrap {
            overflow-x: auto;
        }

        .main__table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .main__table thead {
            background-color: #333333;
        }

        .main__table th, .main__table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #444444;
        }

        .main__table th {
            font-size: 14px;
            font-weight: 600;
        }

        .main__table td {
            font-size: 14px;
        }

        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #0066ff;
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #ff4d4d;
            color: #ffffff;
        }

        .btn-danger:hover {
            background-color: #cc0000;
        }

        form {
            display: inline-block;
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="main__title">
                    <h2>Catalog</h2>
                    <span class="main__title-stat">{{ $movies->total() }} total</span>
                    <div class="main__title-wrap">
                        <a href="{{ route('admin.catalog.create') }}" class="main__title-link">Add Movie</a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="main__table-wrap">
                    <table class="main__table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Quality</th>
                                <th>Release Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($movies as $movie)
                            <tr>
                                <td>{{ $movie->id }}</td>
                                <td>{{ $movie->original_title }}</td>
                                <td>{{ $movie->category }}</td>
                                <td>{{ $movie->quality }}</td>
                                <td>{{ $movie->release_date }}</td>
                                <td>
                                    <a href="{{ route('admin.catalog.edit', $movie->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('admin.catalog.destroy', $movie->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $movies->links() }}
            </div>
        </div>
    </div>
</main>
@endsection
