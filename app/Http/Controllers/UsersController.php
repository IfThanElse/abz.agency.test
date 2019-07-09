<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class UsersController extends Controller
{
    public function showUserHierarhy()
    {
        $users = User::all()->groupBy('parent_id');
        /*$users = array_slice($users, 0 ,50000);
        dd($users);
        $people = new Illuminate\Pagination\Paginator($users);*/

        return view('usersHierarhy',[
            'users' => $users
        ]);

    }
}
