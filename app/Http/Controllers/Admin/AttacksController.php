<?php

namespace App\Http\Controllers\Admin;

use App\Attack;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lesson;
use App\Plan;

class AttacksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($plans_id)
    {
        $plan = Plan::findOrFail($plans_id);
        return view('admin.attacks.create', compact('plan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attack = Attack::create($request->all());
        $attack->save();

        return redirect()->route('plans.show', $request->plan_id)
                ->with('success','Шаблон фишинговой атаки успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.attacks.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attacks = Attack::findOrFail($id);
        $plan = Plan::findOrFail($attacks->plan_id);

        return view('admin.attacks.edit', compact('plan', 'attacks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attack = Attack::find($id);
        $attack->name = $request->name;
        $attack->mail_template = $request->mail_template;
        $attack->save();

        return redirect()->route('plans.show', $attack->plan_id)
                ->with('success','Урок успешно добавлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attack = Attack::findOrFail($id);
        $attack->delete();

        return redirect()->route('plans.show', $attack->plan_id)
                        ->with('success','Шаблон фишинговой атаки удален');
    }
}
