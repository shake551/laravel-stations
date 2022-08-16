<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;
use App\Models\Schedule;

class MovieController extends Controller
{
    public function getMovie(Request $request)
    {
        $is_showing = $request->is_showing;

        $keyword = $request->keyword;

        if (empty($keyword)) {
            if ($is_showing != "") {
                $movies = Movie::where('is_showing', $is_showing)->get();
                
                return view('getMovie', ['movies' => $movies]);
            }
            
            $movies = Movie::all();
            return view('getMovie', ['movies' => $movies]);
        }

        if ($is_showing != "") {
            $movies = Movie::where('title', 'like', '%'.$keyword.'%')
            ->orWhere('description', 'like', '%'.$keyword.'%')
            ->where('is_showing', $is_showing)
            ->get();

            return view('getMovie', ['movies' => $movies]);
        }

        $movies = Movie::where('title', 'like', '%'.$keyword.'%')
        ->orWhere('description', 'like', '%'.$keyword.'%')
        ->get();


        return view('getMovie', ['movies' => $movies]);
    }

    public function getAdminMovie(Request $request)
    {
        $is_showing = $request->is_showing;

        if ($is_showing != "") {
            $movies = Movie::where('is_showing', $is_showing)->get();

            return view('adminMovie', ['movies' => $movies]);
        } 

        $keyword = $request->keyword;

        if (empty($keyword)) {
            $movies = Movie::all();
            return view('adminMovie', ['movies' => $movies]);
        }

        $movies = Movie::where('title', 'like', '%'.$keyword.'%')
        ->orWhere('description', 'like', '%'.$keyword.'%')
        ->get();


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

    public function getAdminItem($id) {
        $movie = Movie::where('id', $id)->get();

        if (empty($movie)) return;

        return view('adminMovieEdit', ['movie' => $movie[0]]);
    }

    public function getItem($id) {
        $movie = Movie::find($id);

        $schedules = Schedule::where('movie_id', $id)->get();

        if (empty($movie) || empty($schedules)) return abort(404);

        return view('getMovieItem', ['movie' => $movie, 'schedules' => $schedules]);
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
