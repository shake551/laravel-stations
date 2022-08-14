<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;


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

        $movie = new Movie();

        $movie->title = $request->title;
        $movie->image_url = $request->image_url;
        $movie->published_year = $request->published_year;
        $movie->description = $request->description;
        $movie->is_showing = $request->is_showing;
        $movie->save();
        return redirect("/");
    }

    public function getItem($id) {
        $movie = Movie::where('id', $id)->get();

        if (empty($movie)) return;

        return view('adminMovieEdit', ['movie' => $movie[0]]);
    }

    public function update(Request $request, $id) {
        $movie = Movie::where('id', $id)->get()[0];

        $movie->title = $request->title;
        $movie->image_url = $request->image_url;
        $movie->published_year = $request->published_year;
        $movie->description = $request->description;
        $movie->is_showing = $request->is_showing;
        $movie->update();
        return redirect("/");
    }

    public function delete($id)
    {
        $movie = Movie::find($id);

        if (empty($movie)) return abort(404);

        $movie->delete();
        return redirect('/admin/movies')->with('flash_message', '削除しました');;
    }
}
