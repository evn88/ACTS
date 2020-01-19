<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class StaffController extends Controller
{
    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/admin/staff';


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.staff.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        return view('admin.staff.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     * Создаем пользователя с паролем по умолчанию
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        User::create($request->all()+['password'=>Hash::make('12345678')]);
        return redirect()->route('staff.index')
                         ->with('success','Сотрудник успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $user = User::findOrFail($id);
        $user = User::with('groups')->findOrFail($id);
        $groups = Group::all();

        return view('admin.staff.edit', compact('user', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, $id)
    {
        // dd($request);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->profession = $request->profession;
        $user->email = $request->email;
        $user->groups()->sync($request->group_id);
        $user->save();

        return redirect()->route('staff.index')
                         ->with('success','Запись обновлена');
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
            return redirect()->route('staff.index')
                        ->with('error','Запись администратора не может быть удалена');
        }
        $user->delete();
        return redirect()->route('staff.index')
                        ->with('success','Запись удалена');
    }
}
