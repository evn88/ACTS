<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Mail\Test;
use App\Mail\Attack;
use Illuminate\Support\Facades\Mail;
use \Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\View\View;

class StaffController extends Controller
{
    use RegistersUsers;
    use SendsPasswordResetEmails;


    /**
     * Where to redirect users after registration.
     *
     * @return
     */
    // protected $redirectTo = '/admin/staff';


    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('admin.staff.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
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
     * @param StoreUser $request
     * @return RedirectResponse
     */
    public function store(StoreUser $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' =>  $request->email,
            'profession' =>  $request->profession,
            'password' => Hash::make(Str::random(60)),
        ]);
        $user->groups()->sync($request->group_id);
        $user->save();

        $user->roles()->attach(2); //добавляем пользователя с ролью гостя

        //отправляем пользователю ссылку на сброс пароля
        Password::sendResetLink( ['email' => $user->email], function (Message $message) {
            $message->subject($this->getEmailSubject());
        });

        return redirect()->route('staff.index')
                         ->with('success','Сотрудник успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
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
     * @param UpdateUser $request
     * @param int $id
     * @return RedirectResponse
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
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
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
