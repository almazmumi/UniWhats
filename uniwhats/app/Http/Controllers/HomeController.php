<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        // $user = \App\User::find(1);
        // Auth::login($user);
        if (!Auth::check()) {
            $groups = \App\Group::select("groups.id","department_id", "courseCode", "isGeneral", "instructorName", "sectionNumber", 'name', 'shortName', 'user_id')
            ->join('departments', 'department_id', '=', "departments.id")
            ->orderBy('courseCode')
            ->orderBy('isGeneral', 'asc')
            ->get();
            return view("home", compact( 'groups'));
        }
        $groups = \App\Group::select("groups.id","department_id", "courseCode", "isGeneral", "instructorName", "sectionNumber", 'name', 'shortName', 'url', 'user_id')
        ->join('departments', 'department_id', '=', "departments.id")
        ->orderBy('courseCode')
        ->orderBy('isGeneral', 'asc')
        ->get();
        return view("home", compact( 'groups'));
    }
}
