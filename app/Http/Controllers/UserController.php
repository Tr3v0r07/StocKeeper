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
        if($request->has('password')){
            $nuser = new User;

            $nuser->first_name = $request->first_name;
            $nuser->last_name = $request->last_name;
            $nuser->email = $request->email;
            $nuser->password = Hash::make($request->password);
            $nuser->role = $request->role;

            $nuser->save();
        }
        else {
            $user = $request->all()->except('_token');

            DB::table('users')->where('id',$user->id)->update([
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'role' => $user->role

            ]);

        }
        return $this->index();


    }

    public function dashview(){

        return view('users.admindash');
    }
    public function edit($id)
    {
       $user = DB::table('users')->where('id',$id)->first();

       return view('users.newUser', compact('user'));
    }

}
