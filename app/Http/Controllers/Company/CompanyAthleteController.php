<?php

namespace App\Http\Controllers\Company;

use App\Models\Athlete;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyAthleteController extends Controller
{
    protected $repository;

    public function __construct(Athlete $athlete)
    {
        $this->repository = $athlete;
    }

    /**
     * Exibe a lista de atletas pertencentes a empresa.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $athletes = Athlete::get();

        return view('company.athletes.index', compact('athletes'));
    }

    /**
     * Exibe um atleta da empresa.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Exibe o formulário para edição dos dados pessoais
     * do atleta.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$athlete = $this->repository->find($id)) {
            return redirect()->route('athletes.index')
                             ->with('alert', 'Atleta não encontrado.');
        }

        return view('company.athletes.edit', compact('athlete'));
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
        if (!$athlete = $this->repository->find($id)) {
            return redirect()->route('athletes.index')
                             ->with('alert', 'Atleta não encontrado.');
        }

        $athlete->user->update($request->all());

        return redirect()->route('athletes.index')
                         ->with('message', 'Atleta atualizado com sucesso.');
    }

    /**
     * Unlink the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unlink(Request $request, $id)
    {
        if (!$athlete = $this->repository->find($id)) {
            return redirect()->route('athletes.index')
                             ->with('alert', 'Atleta não encontrado.');
        }

        $athlete->update($request->all());

        return redirect()->route('athletes.index')
                         ->with('message', 'Atleta desvinculado com sucesso.');
    }
}
