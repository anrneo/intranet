<?php

namespace App\Http\Controllers;

use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(700);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = Role::get();

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $user = User::create([
        'name' => $request['name'],
        'cedula' => $request['cedula'],
        'celular' => $request['celular'],
        'sede' => $request['sede'],
        'cargo' => $request['cargo'],
        'area' => $request['area'],
        'camisa' => $request['camisa'],
        'pantalon' => $request['pantalon'],
        'zapato' => $request['zapato'],
        'sedetipoD' => $request['sedetipoD'],
        'fechaingreso' => $request['fechaingreso'],
        'salario' => $request['salario'],
        'tipoequipo' => $request['tipoequipo'],
        'serial' => $request['serial'],
        'email' => $request['email'],
        'password' => bcrypt($request['password']),
       ]);

       // Actualizar Permisos
       $user->roles()->sync($request->get('roles'));

       return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //dd($request->all());
        return view('users.show', compact('user'));               
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::get();

        return view('users.edit', compact('user', 'roles'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //Actualizar user
       $user->update($request->all());

       $pass=bcrypt($request['password']);
       $user->password=$pass;
       $user->save();
       // Actualizar Permisos
       $user->permissions()->sync($request->get('permissions'));
       
       return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('info', 'Eliminado Correctamente');
    }
}