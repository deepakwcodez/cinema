<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movies;
use Validator;
use DB;
class MovieController extends Controller
{
	public function add()
	{
		return view('movie.addmovie');
	}

	public function store(Request $req)
	{
	    $validator = Validator::make($req->all(), [
	        'title'=>'required',
	        'description'=>'required',
	        'duration'=>'required',
	        'movie_image'=>'required'
        ]);

	    if ($validator->fails()) {
            return redirect(route('movie_add'))->withErrors($validator)->withInput();
        }

		$movie = new Movies;
		$movie->title = $req->title;
		$movie->description = $req->description;
		$movie->duration = $req->duration;
		$movie->movie_image = $req->file('movie_image')->store('public/images/movie');
		$movie->save();
        return redirect(route('movie_add'))->with('alert-success', 'The Movie was add successfully');
	}

	public function manage()
	{
		$movieList = DB::table('tbl_movie')->get();
		return view('movie.managemovie', $movieList);
	}

}