<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cats;
use App\search;
use App\posts;
use App\comments;
use Illuminate\Support\Facades\DB;
use function Ramsey\Uuid\v1;

class CMSController extends Controller
{

    public function index()
    {
        $s = search::all();
        $posts = posts::where("type", "published")->orderBy("created_at", "desc")->paginate(10);
        $cats = cats::all();

        $data = [
            "posts" => $posts,
            "cats" => $cats,
            "searchs" => $s,
        ];
        return view("blog.pages.index")->with($data);
    }

    public function about()
    {
        $s = search::all();
        $posts = posts::where("type", "published")->orderBy("created_at", "desc")->paginate(10);
        $cats = cats::all();
        $data = [
            "cats"  =>  $cats,
            "posts" =>  $posts,
            "searchs" => $s,
        ];
        return view("blog.pages.about")->with($data);
    }

    public function services()
    {
        $s = search::all();
        $posts = posts::where("type", "published")->orderBy("created_at", "desc")->paginate(10);
        $cats = cats::all();
        $data = [
            "cats" => $cats,
            "services" => [
                "PHP MySQL PHPMyAdmin",
                "JS, JQUERY",
                "Bootstrap",
                "Laravel",
                "Core PHP",
            ],
            "Working" => [
                "Web Developing",
                "Web Designing"
            ],
            "posts" => $posts,
            "searchs" => $s,
        ];
        return view("blog.pages.services")->with($data);
    }

    public function category($id)
    {
        $s = search::all();
        $post = ["type" => "published", "cat_id" => $id];
        $posts = posts::where($post)->orderBy("created_at", "desc")->paginate(10);
        $cats = cats::all();

        $data = [
            "posts" => $posts,
            "cats" => $cats,
            "searchs" => $s,
        ];
        return view("blog.pages.category")->with($data);
    }

    public function author($author)
    {
        $s = search::all();

        $post = ["type" => "published", "author" => $author];
        $posts = posts::where($post)->orderBy("created_at", "desc")->paginate(10);
        $cats = cats::all();

        $data = [
            "posts" => $posts,
            "cats" => $cats,
            "searchs" => $s,
        ];
        return view("blog.pages.author")->with($data);
    }

    public function post($id)
    {
        $s = search::all();
        $posts = posts::find($id);
        $cats = cats::all();
        $cmnts = comments::where("post_id", $id)->get();

        $vc = $posts->views_count;
        $posts->views_count = $vc+1;
        $posts->save();


        $data = [
            "post" => $posts,
            "cats" => $cats,
            "comments" => $cmnts,
            "searchs" => $s,
        ];
        return view("blog.pages.single")->with($data);
    }

    public function search(Request $request)
    {
        $s = $request->input("s");
        $posts = DB::select("SELECT * FROM posts WHERE title LIKE '%$s%' OR author LIKE '%$s%' OR tags LIKE '%$s%' OR content LIKE '%$s%' AND type = 'published'");
        $cats = cats::all();
        $sea = search::all();

        $search = new search;
        $search->search = $s;
        $search->save();

        $data = [
            "posts" => $posts,
            "cats" => $cats,
            "searchs" => $sea,
        ];
        return view("blog.pages.search")->with($data);
    }

    public function cmnt(Request $request)
    {
        $this->validate($request, [
            "author" => "required",
            "comment" => "required"
        ]);

        $comments = new comments;
        $comments->post_id = $request->input("id");
        $comments->author = $request->input("author");
        $comments->content = $request->input("comment");
        $comments->save();

        $post = posts::find($request->input("id"));
        $cu = $post->cmnts_count;
        $post->cmnts_count = $cu +1;
        $post->save();

        return redirect("/post/" . $request->input("id"))->with("success", "Comment Saved");
    }

    public function searching(Request $request)
    {
        $query = $request->get('query');
        $data = DB::select("SELECT * FROM searches WHERE search LIKE '%$query%'");
        $output = "<ul class='list-group'>";
            foreach($data as $row):
                $output .= " <li class='list-group-item'><input type='submit' value='".$row->search."' onclick='$(\".search\").val($(this).val())' class='btn'></li> ";
            endforeach;
        $output .= "</ul>";
        echo $output;
    }
}
