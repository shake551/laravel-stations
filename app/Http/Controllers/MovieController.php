<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movie;


class MovieController extends Controller
{
    public function getMovie()
    {
        $movies = Movie::all();
        return view('getMovie', ['movies' => $movies]);
    }

    public function getAdminMovie()
    {
        $movies = Movie::all();
        return view('adminMovie', ['movies' => $movies]);
    }

    public function createPage() {
        return view('adminMovieCreate');
    }

    public function create(Request $request)
    {
        $param = [
            'title' => $request->title,
            'image_url' => $request->image_url,
            'published_year' => $request->published_year,
            'description' => $request->description
        ];

        $movie = Movie::cerate($param);

        $movie->title = $request->title;
        $movie->image_url = $request->image_url;
        $movie->published_year = $request->published_year;
        $movie->description = $request->description;
        $movie->is_showing = $request->is_showing;
        $movie->save();
        return redirect("/");
    }
}
