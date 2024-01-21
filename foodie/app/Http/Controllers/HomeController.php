<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   public function index()
   {
      $data['categories'] = Category::all();
      return view("home.home", $data);
   }
   public function login(Request $req)
   {
      if ($req->isMethod("post")) {
         $data = $req->validate([
            "email" => "required",
            "password" => "required",
         ]);

         if (Auth::attempt($data)) {
            return redirect()->route("home.index"); // Add the 'return' statement here
         } else {
            return redirect()->back()->with("error", "Email or password invalid");
         }
      }

      return view("home.login");
   }
   public function signup(Request $request)
   {
      if ($request->isMethod("post")) {
         $data = $request->validate([
            "email" => "required",
            "password" => "required",
            "name" => "required"
         ]);

         $data['password'] = bcrypt($data['password']);
         User::create($data);

         return redirect()->route('login');
      }

      return view("home.signup");
   }

   // public function redirectToGoogle()
   // {
   //    return Socialite::driver('google')->redirect();
   // }

   // public function handleGoogleCallback()
   // {
   //    $googleUser = Socialite::driver('google')->user();

   //    // Check if the user already exists in your database
   //    $user = User::where('email', $googleUser->getEmail())->first();

   //    if (!$user) {
   //       // If the user doesn't exist, create a new user
   //       $user = User::create([
   //          'name' => $googleUser->getName(),
   //          'email' => $googleUser->getEmail(),
   //          // Add other necessary fields
   //       ]);
   //    }

   //    // Log in the user
   //    Auth::login($user, true);

   //    return redirect()->route('home.index');
   // }


   public function logout(Request $req)
   {
      Auth::logout();
      return redirect()->route("login");
   }
}
