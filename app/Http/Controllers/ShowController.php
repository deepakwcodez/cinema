<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shows;
use Validator;
use DB;

class ShowController extends Controller
{
	public function add()
	{
		$file = public_path()."/screen_list.json";
        $getScreenList = json_decode(file_get_contents($file), true);
        $collectScreen = collect($getScreenList);
        $screenList = $collectScreen->filter(function ($value, $key) {
		    if($value['is_delete'] != 1) {
		    	return $value;
		    }
		})->all();
		return view('show.addshow', compact('screenList'));
	}

	public function store(Request $req)
	{
	    $validator = Validator::make($req->all(), [
	        'movie_name'=>'required',
	        'time'=>'required',
	        'screen'=>'required'
        ]);

	    if ($validator->fails()) {
            return redirect(route('show_add'))->withErrors($validator)->withInput();
        }

		$show = new Shows;
		$show->movie_name = $req->movie_name;
		$show->time = $req->time;
		$show->screen = $req->screen;
		$show->save();
        return redirect(route('show_add'))->with('alert-success', 'The Show was add successfully');
	}

	public function manage()
	{
		$file = public_path()."/screen_list.json";
        $getScreenList = json_decode(file_get_contents($file), true);
        $collectScreen = collect($getScreenList);

		$showList = Shows::whereNotIn('status',[0])->get();
		foreach ($showList as $key => $value) {
			$value->screen = $collectScreen->where('id',$value->screen)->first()['title'];
		}
		return view('show.manageshow', compact('showList'));
	}

	public function edit($id)
	{
		$show = Shows::find(decrypt($id));
		return view('show.editshow', compact('show'));
	}

	public function update(Request $req)
	{
		$validator = Validator::make($req->all(), [
	        'movie_name'=>'required',
	        'time'=>'required',
	        'screen'=>'required'
        ]);

	    if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

		$show = Shows::find(decrypt($req->mid));
		$show->movie_name = $req->movie_name;
		$show->time = $req->time;
		$show->screen = $req->screen;
		$show->update();
		return redirect()->back()->with('alert-success', 'The Show was update successfully');
	}

	public function remove($id)
	{
		$movie = Shows::find(decrypt($id));
		$movie->status = 0;
		$movie->update();
		return redirect()->back();
	}
}