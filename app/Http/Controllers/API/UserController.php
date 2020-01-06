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
        return 'delete';
    }

}
