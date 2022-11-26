<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    public function index(){
        return view('Dashboard');
    }

    public function add_admin(){
        return view('add-admin');
    }

    public function store_admim(Request $request){
        $user = new User;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->save();
        return redirect()->back();
    }

    public function view(){
        $users = User::where('status','admin')->get();
        return view('view-users')->with(['users' => $users]);
    }
}
