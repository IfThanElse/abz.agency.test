<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function showUserHierarhy()
    {
        $users = User::all()->groupBy('parent_id');
        return view('usersHierarhy',[
            'users' => $users
        ]);

    }
}
