<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upcoming;
use Validator;
use DB;

class UpcomingController extends Controller
{

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function add()
	{
		return view('upcoming_movies.addupcomingmovie');
	}

	public function store(Request $req)
	{
	    $validator = Validator::make($req->all(), [
	        'title'=>'required',
	        'upcoming_movie_image'=>'required'
        ]);

	    if ($validator->fails()) {
            return redirect(route('upcoming_add'))->withErrors($validator)->withInput();
        }

		$upcoming = new Upcoming;
		$upcoming->title = $req->title;
		$upcoming->movie_image = $req->file('upcoming_movie_image')->store('public/images/upcomingmovies');
		$upcoming->save();
        return redirect(route('upcoming_add'))->with('alert-success', 'The Upcoming Movie was add successfully');
	}

	public function manage()
	{
		$upcomingList = Upcoming::whereNotIn('status',[0])->get();
		return view('upcoming_movies.manageupcomingmovie', compact('upcomingList'));
	}

	public function edit($id)
	{
		$upcoming = Upcoming::find(decrypt($id));
		return view('upcoming_movies.editupcomingmovie', compact('upcoming'));
	}

	public function update(Request $req)
	{
		$validator = Validator::make($req->all(), [
	        'title'=>'required'
        ]);

	    if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

		$upcoming = Upcoming::find(decrypt($req->mid));
		$upcoming->title = $req->title;
		if (isset($req->upcoming_movie_image)) {
			$upcoming->movie_image = $req->file('upcoming_movie_image')->store('public/images/upcomingmovies');
		}
		$upcoming->update();
		return redirect()->back()->with('alert-success', 'The Upcoming Movie was update successfully');
	}

	public function remove($id)
	{
		$upcoming = Upcoming::find(decrypt($id));
		$upcoming->status = 0;
		$upcoming->update();
		return redirect()->back();
	}

}