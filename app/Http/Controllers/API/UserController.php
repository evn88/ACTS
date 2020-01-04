<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index () {
        return User::all();
    }

    public function show ($id) {
        // dd(User::find($id)->toJson());
        return User::findOrFail($id)->toJson();
    }

    public function store (Request $request) {
        return response('OK', 200);
    }

    public function edit($id)
    {
        //
    }

}
