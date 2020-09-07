<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function profile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view("admin/pages/profile")->with("user", $user);
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            "name"      =>  "required",
            "email"     =>  "required",
            "gender"    =>  "required",
            "f_name"    =>  "required",
            "l_name"    =>  "required",
        ]);

        $id = Auth::user()->id;
        $user = User::find($id);
        $user->first_name   =  $request->input("f_name");
        $user->last_name    =  $request->input("l_name");
        $user->gender       =  $request->input("gender");
        $user->email        =  $request->input("email");
        $user->name         =  $request->input("name");
        $user->save();

        return redirect("/admin")->with("success", "Data Saved");
    }

    public function package()
    {
        $user = User::find(Auth::user()->id);
        $user->post_package = $user->post_package+15;
        $user->save();
        return redirect("/admin/posts");
    }
}
