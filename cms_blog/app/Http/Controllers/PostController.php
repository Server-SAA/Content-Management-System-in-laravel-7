<?php

namespace App\Http\Controllers;

use App\posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\comments;
use App\User;

class PostController extends Controller
{
    public function remove($id)
    {
        $user = User::find(Auth::user()->id);
        $pc = $user->post_count;
        $user->post_count = $pc -1;
        $user->save();
        posts::destroy($id);
        return redirect("/admin/posts")->with("success", "Post Deleted");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "title"     => "required|min:5|max:100",
            "content"   => "required|min:100",
            "tags"      => "required|min:5",
            "cat"  => "required",
            "type"      => "required",
        ]);
        if (Auth::user()->post_count < Auth::user()->post_package):
            $post = new posts;
            $post->author = Auth::user()->name;
            $post->title = $request->input("title");
            $post->content = $request->input("content");
            $post->tags = $request->input("tags");
            $post->cat_id = $request->input("cat");
            $post->type = $request->input("type");
            $post->save();
            $user = User::find(Auth::user()->id);
            $count = $user->post_count;
            $user->post_count = $count+1;
            $user->save();
            $type = "success";
            $message = "Post Added";
        else:
            $type = "error";
            $message = "package has been expired.<br>Delete some post and try again.<br>For renew your package click here <a href='/admin/posts/package/renew'>ReNew</a>";
        endif;

        return redirect("/admin/posts")->with($type, $message);
    }

    public function edit($id)
    {
        $post = posts::find($id);
        return view("admin.pages.edit_post")->with("post", $post);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            "title"     => "required|min:5|max:100",
            "content"   => "required|min:100",
            "tags"      => "required|min:5",
            "type"      => "required",
        ]);
        $post = posts::find($request->input("id"));
        $post->author = Auth::user()->name;
        $post->title = $request->input("title");
        $post->content = $request->input("content");
        $post->tags = $request->input("tags");
        $post->type = $request->input("type");
        $post->save();
        return redirect("/admin/posts");
    }

    public function reset($id)
    {
        $post = posts::find($id);
        $post->views_count = 0;
        $post->save();
        return redirect("/admin/posts");
    }

    public function comments($id)
    {
        $cmnt = comments::where("post_id", $id)->get();
        return view("admin.pages.comments")->with("cmnts", $cmnt);
    }
}
