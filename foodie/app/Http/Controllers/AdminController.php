<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Product, Category};
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $data['products'] = Product::count();
        $data['categories'] = Category::count();
        return view("admin.dashboard", $data);
    }

    public function login(Request $req){
        if($req->isMethod("post")){
            $data = $req->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

            if(Auth::guard('admin')->attempt($data)){
                return redirect('/admin')->with("success","Admin Login successfully");
            }
            else{
                return back()->with("error","Username or password is inncorrect");
            }
           
        }
        return view("admin.adminLogin");

    }
    public function logout(Request $req){
        Auth::guard("admin")->logout();
        return redirect()->route("adminlogin")->with("error","Admin logout successfully");
    }
}

