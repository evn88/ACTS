<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index () {
        return User::with('groups')->get();
    }

    public function show ($id) {
        return User::findOrFail($id)->toJson();
    }

    public function store (Request $request) {
        // return response('OK', 200);
    }

    public function edit($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->isAdmin()){
            return response('Forbidden', 403);
        }
        $user->delete();
        return response('OK', 200);
    }

}
