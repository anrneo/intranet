<?php

namespace App\Http\Controllers;

use App\Pqrdat;
use Illuminate\Http\Request;

class PqrdatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pqrdats = Pqrdat::paginate(5);

        return view('pqrdats.index', compact('pqrdats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pqrdats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       Pqrdat::create($request->all());
        //dd($request->all());
        return 'Store';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pqrdat  $pqrdat
     * @return \Illuminate\Http\Response
     */
    public function show(Pqrdat $pqrdat)
    {
        return view('pqrdats.show', compact('pqrdat'));               
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pqrdat  $pqrdat
     * @return \Illuminate\Http\Response
     */
    public function edit(Pqrdat $pqrdat)
    {
        return view('pqrdats.edit', compact('pqrdat'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pqrdat  $pqrdat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pqrdat $pqrdat)
    {
       $pqrdat->update($request->all());
       return redirect()->route('pqrdats.index')
       ->with('info', 'Producto actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pqrdat  $pqrdat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pqrdat $pqrdat)
    {
        //
    }
}
