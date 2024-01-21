<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data['products'] = Product::paginate(5);
        return view("admin.manageProduct", $data);
    }
    public function search(Request $req)
    {
        $search = $req->search;
        $data['results'] = Product::where("ti", "like", "%$search%")->get();
        $data['search'] = $search;
        return view("home", $data);
    }
    public function insert()
    {
        $data['categories'] = Category::all();
        return view("admin.insertProduct", $data);
    }
    public function edit()
    {
        return view("admin.editProduct");
    }
    public function update(Request $req, $id)
    {
    }
    public function removeProduct(Request $req)
    {
        return view("admin.editProduct");
    }
    public function store(Request $req)
    {
        $data = $req->validate([
            'title' => 'required',
            'isVeg' => 'required',
            'price' => 'required',
            'discount_price' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ]);
        //image work
        $filename = $req->file('image')->getClientOriginalName();
        $path = $req->file('image')->storeAs("public", $filename);

        $data['image'] = $filename;
        Product::create($data);
        return redirect()->route("admin.product.index")->with("msg", "product insert Successfully");
    }
}
