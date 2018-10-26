<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class ScreenController extends Controller
{
	public function add()
	{
		return view('screen.addscreen');
	}

	public function store(Request $req)
	{
		$input = $req->all();

	    $validator = Validator::make($req->all(), [
	        'title'=>'required',
        ]);

		if ($validator->fails()) {
            return redirect(route('screen_add'))->withErrors($validator)->withInput();
        }

	    $file = public_path()."/screen_list.json";
        $json = json_decode(file_get_contents($file), true);
        $insertArray = [
        	'id' => time(),
        	'title' => $input['title'],
        	'is_delete' => 0
        ];
        $json[] = $insertArray;
        file_put_contents($file, json_encode($json));

        return redirect(route('screen_add'))->with('alert-success', 'The Screen Added Successfully');
	}

	public function manage()
	{
		$file = public_path()."/screen_list.json";
        $getScreenList = json_decode(file_get_contents($file), true);
        $collectScreen = collect($getScreenList);
        $screenList = $collectScreen->filter(function ($value, $key) {
		    if($value['is_delete'] != 1) {
		    	return $value;
		    }
		})->all();
		
		return view('screen.managescreen', compact('screenList'));
	}

	public function delete($id)
	{
		$file = public_path()."/screen_list.json";
        $screenList = json_decode(file_get_contents($file), true);
        $collectScreen = collect($screenList);
        
		$remove = $id;
		$filtered = $collectScreen->map(function ($value, $key) use($remove){
		    if($value['id']==$remove) {
		    	$value['is_delete'] = 1;
		    }
		    return $value;
		});
		
        file_put_contents($file, json_encode($filtered));
        return redirect(route('screen_manage'))->with('alert-success', 'The Screen Deleted Successfully');
	}

}