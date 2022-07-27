<?php

namespace App\Http\Controllers;

use App\Movie;


class MovieController extends Controller
{
    public function getMovie()
    {
        $movies = Movie::all();
        return view('getMovie', ['movies' => $movies]);
    }
}
