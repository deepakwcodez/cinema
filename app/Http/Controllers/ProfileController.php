<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class ProfileController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.index');
    }

    public function changepass(Request $req)
    {
        $current_password = Auth::User()->password;
        if (!empty($req->new_password) && !empty($req->confirm_new_password) && !empty($req->current_password) && $req->new_password===$req->confirm_new_password) {
            if(Hash::check($req->current_password, $current_password))
            {
                $user_id = Auth::User()->id;
                $obj_user = User::find($user_id);
                $obj_user->password = Hash::make($req->new_password);
                $obj_user->save();
                return redirect(route('profile_index'))->with('alert-success', 'Sucessfully change password');
            }
            else {
                return redirect(route('profile_index'))->with('alert-danger', 'Password doesn\'t match to current password');
            }
        }
        else {
            return redirect(route('profile_index'))->with('alert-danger', 'New password doesn\'t match to confirm password');
        }
    }
}