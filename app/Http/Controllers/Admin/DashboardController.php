<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        $users = User::all();
        return view('admin.dashboard', compact('groups', 'users'));
    }
}
