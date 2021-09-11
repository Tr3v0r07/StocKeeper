<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public $users;

    public function index(){

        $users = User::all();

        return view ('users.userlist', compact('users'));

    }

    public function newUser(Request $request)
    {
        $nuser = new User;

        $nuser->first_name = $request->first_name;
        $nuser->last_name = $request->last_name;
        $nuser->email = $request->email;
        $nuser->password = Hash::make($request->password);
        $nuser->role = $request->role;

        $nuser->save();


        return $this->index();


    }

}
