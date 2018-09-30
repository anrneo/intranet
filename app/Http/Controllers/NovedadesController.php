<?php

namespace App\Http\Controllers;

use App\User;
use App\Novedades;
use Illuminate\Http\Request;

class NovedadesController extends Controller
{
    public function admin()
    {
        $reports=DB::table('Novedades')->wher('coordinador', Auth()->user()->id)->get();

        return view('GH.novedades.admin' compact('reports'));
    }
}
