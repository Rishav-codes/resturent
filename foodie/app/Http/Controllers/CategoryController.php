<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function manageCategory(Request $req)
    {
        if ($req->isMethod("post")) {
            $data = $req->validate(['cat_title' => "required"]);
            Category::create($data);
            return redirect()->route("admin.category");
        }
        $data['categories'] = Category::all();
        return view("admin.manageCategory", $data);
    }
    public function updateCategory(Request $req, $id)
    {
        if ($req->isMethod("post")) {
            $data = $req->validate(['cat_title' => "required"]);
            Category::findorfail($id)->update($data);
            return redirect()->route("admin.category");
        }
        $data['categories'] = Category::all();
        return view("admin.manageCategory", $data);
    }

    public function deleteCategory(Request $req)
    {
        $id = $req->id;
        $record = Category::findOrFail($id);
        $record->delete();
        return redirect()->route("admin.category");
    }
}
