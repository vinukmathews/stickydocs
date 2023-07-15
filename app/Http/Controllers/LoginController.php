<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class LoginController extends Controller
{
    public function getLogin(){
        return view('admin.pages.login');
    }

    public function postLogin(Request $request){
        
        request()->validate([
            "email"   => "required|email",
            "password" => "required",
        ]);

        $remember = $request->remember;

        if (
            Auth::attempt(
                [
                    "email" => $request->email,
                    "password" => $request->password,
                    "user_type" => 1,
                ],
                $remember
            )
        ) {
            return redirect("admin/admin-dashboard");
        } else {
            return redirect()
                ->back()
                ->with("custom_error", "Invalid sigin credentials provided");
        }
    }

    public function getClientLogin(){
        return view('client.pages.login');
    }

    public function getLogout()
    {
        Session::flush();

        Auth::logout();

        return redirect("/")->with(
            "success",
            "Session ended, hope to see you soon"
        );
    }

}
