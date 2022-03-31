<?php

namespace App\Http\Controllers\Intervenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Intervenant;
use App\Service;
use App\Fonction;
use App\Direction;
use App\Discussion;

class IntervenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $intervenant= Intervenant::paginate(10);
        return view('intervenant.index', compact('intervenant'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fonction=Fonction::all();
        $direction=Direction::all();
        return view('intervenant.create', [
            'direction'=>$direction,
            'fonction'=>$fonction
         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $intervenant = new Intervenant();
        $intervenant->nom=$request->nom;
        $intervenant->direction_id=$request->direction_id;
        $intervenant->fonction_id=$request->fonction_id;
        $intervenant->save();

        return redirect()->route('intervenant.index');
    }
    public function autre(Request $request)
    {
        $intervenant = new Intervenant();
        $intervenant->nom=$request->nom;
        $intervenant->direction_id=$request->direction_id;
        $intervenant->fonction_id=$request->fonction_id;
        $intervenant->save();

        return redirect()->route('intervenant.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Intervenant $intervenant)
    {
        $fonction=Fonction::all();
        $direction=Direction::all();
        return view('intervenant.edit', [
            'direction'=>$direction,
            'fonction'=>$fonction,
            'intervenant'=>$intervenant
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Intervenant $intervenant)
    {

        $intervenant->nom = $request->nom;
        $intervenant->fonction_id= $request->fonction_id;
        $intervenant->direction_id = $request->direction_id;
        $intervenant->save();
        return redirect()->route('intervenant.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Intervenant $intervenant)
    {
        $intervenant->delete();
        return redirect()->route('intervenant.index');
    }
}
