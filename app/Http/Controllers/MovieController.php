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
        $request->validate([
            'title'=>["required","unique:App\Models\Movie,title"],
            'image_url'=>["required","url"],
            'published_year'=>["required","numeric"],
            'description'=>["required","string"],
            'is_showing'=>["required","boolean"]
        ]);

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
        $request->validate([
            'title'=>["required","unique:App\Models\Movie,title"],
            'image_url'=>["required","url"],
            'published_year'=>["required","numeric"],
            'description'=>["required","string"],
            'is_showing'=>["required","boolean"]
        ]);

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
