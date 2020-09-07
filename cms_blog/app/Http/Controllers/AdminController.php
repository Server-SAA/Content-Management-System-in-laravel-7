<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\cats;
use App\comments;
use App\posts;

class AdminController extends Controller
{
    public $custom;

    public function index()
    {
        return view("admin.pages.index")->with("custom" ,$this->custom);
    }

    public function categories()
    {
        $cat = cats::all();
        $this->custom = "categories";
        $data = [
            "custom" => $this->custom,
            "cats" => $cat
        ];
        return view("admin.pages.category")->with($data);
    }

    public function posts()
    {
        $cats = cats::all();
        $posts = posts::where("author", Auth::user()->name)->get();
        $this->custom = "posts";
        $data = [
            "cats" => $cats,
            "posts" => $posts,
            "custom" => $this->custom
        ];
        return view("admin.pages.post")->with($data);
    }

    public function users()
    {
        $users = User::all();
        $this->custom = "users";
        $data = [
            "users" => $users,
            "custom" => $this->custom
        ];
        return view("admin.pages.user")->with($data);
    }

    public function commentRemove($id, $p_id)
    {
        $post = posts::find($p_id);
        $cc = $post->cmnts_count;
        $post->cmnts_count = $cc -1;
        $post->save();
        comments::destroy($id);
        return redirect("/admin/posts")->with("success", "Comment Deleted");
    }
}
