<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showhome()
    {
        $movies = Movie::paginate(12);
        return view('home', ['movies' => $movies]);
    }

    public function showadmin()
    {
        $movies = Movie::paginate();
        return view('admin.index', ['movies' => $movies]);
    }

    public function index()
    {
        $movies = Movie::paginate(12);
        return view('admin.catalog.catalog', ['movies' => $movies]);
    }

    public function create()
    {
        return view('admin.catalog.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'original_title' => 'required',
            'overview' => 'required',
            'release_date' => 'required',
            'length' => 'required',
            'quality' => 'required',
            'country' => 'required',
            'genre' => 'required',
            'category' => 'required',
            'poster_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'backdrop_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $poster = $request->file('poster_path')->getClientOriginalName();
        $request->poster_path->move(public_path('images'), $poster);

        $backdrop = $request->file('backdrop_path')->getClientOriginalName();
        $request->backdrop_path->move(public_path('images'), $backdrop);

        $movie = new Movie();
        $movie->original_title = $request->input('original_title');
        $movie->overview = $request->input('overview');
        $movie->release_date = $request->input('release_date');
        $movie->length = $request->input('length');
        $movie->quality = $request->input('quality');
        $movie->country = $request->input('country');
        $movie->genre = $request->input('genre');
        $movie->category = $request->input('category');
        $movie->poster_path = 'images/' . $poster;
        $movie->backdrop_path = 'images/' . $backdrop;
        $movie->save();

        return redirect()->route('admin.catalog.index')->with('message', 'Movie Added!');
    }

    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return view('admin.catalog.show', compact('movie'));
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        return view('admin.catalog.edit', compact('movie'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'original_title' => 'required',
            'overview' => 'required',
            'release_date' => 'required',
            'length' => 'required',
            'quality' => 'required',
            'country' => 'required',
            'genre' => 'required',
            'category' => 'required',
            'poster_path' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'backdrop_path' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $movie = Movie::findOrFail($id);

        $movie->original_title = $request->input('original_title');
        $movie->overview = $request->input('overview');
        $movie->release_date = $request->input('release_date');
        $movie->length = $request->input('length');
        $movie->quality = $request->input('quality');
        $movie->country = $request->input('country');
        $movie->genre = $request->input('genre');
        $movie->category = $request->input('category');

        if ($request->hasFile('poster_path')) {
            $poster = $request->file('poster_path')->getClientOriginalName();
            $request->poster_path->move(public_path('images'), $poster);
            $movie->poster_path = 'images/' . $poster;
        }

        if ($request->hasFile('backdrop_path')) {
            $backdrop = $request->file('backdrop_path')->getClientOriginalName();
            $request->backdrop_path->move(public_path('images'), $backdrop);
            $movie->backdrop_path = 'images/' . $backdrop;
        }

        $movie->save();

        return redirect()->route('admin.catalog.index')->with('flash_message', 'Movie updated!');
    }

    public function destroy($id)
    {
        Movie::destroy($id);
        return redirect()->route('admin.catalog.index')->with('flash_message', 'Movie deleted!');
    }
}









