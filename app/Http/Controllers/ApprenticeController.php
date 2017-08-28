<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ApprenticeRequest;
use App\Apprentice;


class ApprenticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataApprentice  = Apprentice::all()->sortBy('nombre_completo');
        return view('apprentices.index')->with('dataApprentice', $dataApprentice );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('apprentices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApprenticeRequest $request)
    {
        $dataApprentice = new Apprentice();
        $dataApprentice->nombre_completo       = $request->get('nombre_completo');
        $dataApprentice->tipo_documento   = $request->get('tipo_documento');
        $dataApprentice->numero_documento  = $request->get('numero_documento');
        $dataApprentice->direccion = $request->get('direccion');
        $dataApprentice->barrio = $request->get('barrio');
        $dataApprentice->estrato = $request->get('estrato');
        $dataApprentice->telefono = $request->get('telefono');
        $dataApprentice->email = $request->get('email');
        $dataApprentice->programa_formacion = $request->get('programa_formacion');
        $dataApprentice->numero_ficha = $request->get('numero_ficha');
        $dataApprentice->jornada = $request->get('jornada');
        $dataApprentice->pregunta1 = $request->get('pregunta1');
        $dataApprentice->pregunta2 = $request->get('pregunta2');
        $dataApprentice->pregunta3 = $request->get('pregunta3');
        $dataApprentice->otro_apoyo = $request->get('otro_apoyo');
        $dataApprentice->compromiso_informar = $request->get('compromiso_informar');
        $dataApprentice->compromiso_normas = $request->get('compromiso_normas');
        $dataApprentice->justificacion_suplemento = $request->get('justificacion_suplemento');
        if ($dataApprentice->save()){
            return redirect('/admin/apprentice')->with('status', 'El aprendiz '.$dataApprentice->nombre_completo.' fue adicionado con éxito');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('apprentices.show')->with('dataApprentice', apprentice::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataApprentice = Apprentice::find($id);
        return view('apprentices.edit')->with('dataApprentice', $dataApprentice);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApprenticeRequest $request, $id)
    {
        $dataApprentice = Apprentice::find($id);
        $dataApprentice->nombre_completo       = $request->get('nombre_completo');
        $dataApprentice->tipo_documento   = $request->get('tipo_documento');
        $dataApprentice->numero_documento  = $request->get('numero_documento');
        $dataApprentice->direccion = $request->get('direccion');
        $dataApprentice->barrio = $request->get('barrio');
        $dataApprentice->estrato = $request->get('estrato');
        $dataApprentice->telefono = $request->get('telefono');
        $dataApprentice->email = $request->get('email');
        $dataApprentice->programa_formacion = $request->get('programa_formacion');
        $dataApprentice->numero_ficha = $request->get('numero_ficha');
        $dataApprentice->jornada = $request->get('jornada');
        $dataApprentice->pregunta1 = $request->get('pregunta1');
        $dataApprentice->pregunta2 = $request->get('pregunta2');
        $dataApprentice->pregunta3 = $request->get('pregunta3');
        $dataApprentice->otro_apoyo = $request->get('otro_apoyo');
        $dataApprentice->compromiso_informar = $request->get('compromiso_informar');
        $dataApprentice->compromiso_normas = $request->get('compromiso_normas');
        $dataApprentice->justificacion_suplemento = $request->get('justificacion_suplemento');
        if ($dataApprentice->save()){
            return redirect('/admin/apprentice')->with('status', 'El aprendiz '.$dataApprentice->nombre_completo.' fue modificado con éxito');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Apprentice::destroy($id);
        return redirect('/admin/apprentice')->with('status', 'El aprendiz fue eliminado con éxito');
    }

}
