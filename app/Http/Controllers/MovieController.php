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
		$movieList = Movies::whereNotIn('status',[0])->get();
		return view('movie.managemovie', compact('movieList'));
	}

	public function edit($id)
	{
		$movie = Movies::find(decrypt($id));
		return view('movie.editmovie', compact('movie'));
	}

	public function update(Request $req)
	{
		$validator = Validator::make($req->all(), [
	        'title'=>'required',
	        'description'=>'required',
	        'duration'=>'required'
        ]);

	    if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

		$movie = Movies::find(decrypt($req->mid));
		$movie->title = $req->title;
		$movie->description = $req->description;
		$movie->duration = $req->duration;
		if (isset($req->movie_image)) {
			$movie->movie_image = $req->file('movie_image')->store('public/images/movie');
		}
		$movie->update();
		return redirect()->back();
	}

	public function remove($id)
	{
		$movie = Movies::find(decrypt($id));
		$movie->status = 0;
		$movie->update();
		return redirect()->back();
	}

}