<?php

namespace App\Http\Controllers\Admin;

use App\Plan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::all();
        return view('admin.plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $path = $request->file('img_file')->store('img/plans', 'public');


        $plans = Plan::create($request->all()+['img'=>$path]);

        $plans->save();

        return redirect()->route('plans.index')
                         ->with('success','Группа успешно добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plan = Plan::findOrFail($id);
        return view('admin.plans.show', compact('plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plans = Plan::findOrFail($id);
        return view('admin.plans.edit', compact('plans'));
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
        $plans = Plan::findOrFail($id);
        $plans->name = $request->name;
        $plans->date_start = $request->date_start;
        $plans->date_end = $request->date_end;
        $plans->save();

        return redirect()->route('plans.index')
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
        $plans = Plan::findOrFail($id);
        $del = Storage::delete('public/'.$plans->img);
        if($del) $plans->delete();
        return redirect()->route('plans.index')
                        ->with('success','Запись удалена');
    }
}
