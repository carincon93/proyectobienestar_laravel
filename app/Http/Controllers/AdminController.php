<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apprentice;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apprentice = Apprentice::all();
        return view('admin.dashboard')->with('apprentice', $apprentice);
    }
    public function Aprendizaceptado($id)
    {
        $apprentice = Apprentice::find($id);
        $apprentice->estado_beneficio = 1;
        if($apprentice->save()){
            return redirect('admin')->with('status', 'El Aprendiz <strong>'.$apprentice->nombre_completo.'</strong>
            fue modificad@ con exito!');

        }
    }
    public function Aprendizrechazado($id)
    {
        Apprentice::destroy($id);
        return redirect('admin')->with('status', 'El aprendiz fue rechazado con exito!');
    }

}
