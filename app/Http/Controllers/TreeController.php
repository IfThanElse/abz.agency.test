<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class TreeController extends Controller
{
    public function treeView()
    {
        $users = User::where('parent_id', '=', 0)->get();
        $tree = '<ul id="browser" class="filetree"><li class="tree-view"></li>';
        dd($users);
        foreach ($users as $user) {
            $tree .= '<li class="tree-view ">' . 'Name: '.'<a class="tree-name">'. $user->name .'</a>'
                                                        .'<br>'. 'Position: ' .  $user->position
                                                        .'<br>'. 'Salary: ' .  $user->salary . ' $';
            if (count($user->childs)) {
                $tree .= $this->childView($user);
            }
        }
        $tree .= '<ul>';
        // return $tree;
        return view('treeview', compact('tree'));
    }

    public function childView($user)
    {
        $html = '<ul>';
        foreach ($user->childs as $arr) {
            if (count($arr->childs)) {
                $html .= '<li class="tree-view closed">' . 'Name: '.'<a class="tree-name">'. $arr->name .'</a>'
                                                        .'<br>'. 'Position: ' .  $arr->position
                                                        .'<br>'. 'Salary: ' .  $arr->salary . ' $'
                                                        .'<br>'. 'Employment date: ' .  $arr->employment_date;
                $html .= $this->childView($arr);
            } else {
                $html .= '<li class="tree-view">' . 'Name: '.'<a class="tree-name">'. $arr->name .'</a>'
                                                        .'<br>'. 'Position: ' .  $arr->position
                                                        .'<br>'. 'Salary: ' .  $arr->salary . ' $'
                                                        .'<br>'. 'Employment date: ' .  $arr->employment_date;
                $html .= "</li>";
            }

        }

        $html .= "</ul>";
        return $html;
    }
}