<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use App\Models\Plan;

class PlanController extends Controller
{
    /**
     * Exibe uma lista com todos os planos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::with('details')->get();
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
     * @param  App\Http\Requests\StoreUpdatePlan  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePlan $request)
    {
        Plan::create($request->all());

        return redirect()->route('plans.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plan = Plan::where('id', $id)->first();

        if(!$plan)
            return redirect()->back();

        return view('admin.plans.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdatePlan  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePlan $request, $id)
    {
        $plan = Plan::where('id', $id)->first();

        if (!$plan)
            return redirect()->back();

        $plan->update($request->all());

        return redirect()->route('plans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan = Plan::with('details')
                     ->where('id', $id)
                     ->first();

        if (!$plan)
            return redirect()->back();

        if ($plan->companies->count() > 0) {
            $notification = array(
                'message' => 'Não é possível excluir esse plano, pois existem empresas vinculados a ele.', 
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        $plan->extensions()->detach();

        $plan->delete();

        return redirect()->route('plans.index')
                         ->with('message', 'Plano deletado com sucesso.');
    }
}