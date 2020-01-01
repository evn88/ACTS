<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class TestController extends Controller
{
    public function index () {
        return User::all();
    }
}
