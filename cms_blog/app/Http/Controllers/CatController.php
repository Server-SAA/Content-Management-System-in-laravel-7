<?php

namespace App\Http\Controllers;

use App\cats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatController extends Controller {
    public function remove($id)
    {
        cats::destroy($id);
        return redirect("/admin/categories")->with("success", "Category Deleted");
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            "title" => "Required|min:3|max:10|",
        ], [
            "title" => "Title is required",
        ]);
        $cat = cats::where("title", $request->input("title"))->get();
        if (count($cat) == 0)
        {
            $cat = new cats;
            $cat->title = $request->input("title");
            $cat->save();
            return redirect("admin/categories")->with("success", "Category Saved Success");
        }
        return redirect("admin/categories")->with("error", "Category already exist");

    }

    public function update(Request $request)
    {
        $this->validate($request, [
            "title" => "Required|min:3|max:10|",
        ]);

        $cat = cats::find($request->input("id"));
        $cat->title = $request->input("title");
        $cat->save();
        return redirect("admin/categories")->with("success", "Category updated Success");
    }
}
