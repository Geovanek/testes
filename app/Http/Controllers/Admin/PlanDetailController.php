<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlanDetail;
use App\Models\Plan;
use App\Models\PlanDetail;

class PlanDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Plan $plan)
    {
        $plan->load('details');

        return view('admin.plans.planDetails.index', compact('plan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Plan $plan)
    {
        return view('admin.plans.planDetails.create', compact('plan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePlanDetail $request, Plan $plan)
    {
        $plan->details()->create($request->all());

        return redirect()->route('details.index', $plan->slug)
                         ->with('message', 'Detalhe criado com sucesso.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan, PlanDetail $detail)
    {
        return view('admin.plans.planDetails.edit', compact('plan', 'detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePlanDetail $request, Plan $plan, PlanDetail $detail)
    {
        $detail->update($request->all());

        return redirect()->route('details.index', $plan->slug)
                         ->with('message', 'Detalhe editado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan, PlanDetail $detail)
    {
        $detail->delete();

        return redirect()->route('details.index', $plan)
                         ->with('message', 'Detalhe deletado com sucesso.');
    }
}