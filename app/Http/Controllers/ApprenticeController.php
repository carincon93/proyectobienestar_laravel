<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ApprenticeRequest;

use Auth;
use Excel;
use App\Apprentice;


class ApprenticeController extends Controller
{
    protected $dataApprentice = [];

    public function __construct()
    {
        $this->middleware('auth')->except('entrega_suplemento', 'ajax');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        redirect('admin/dashboard');
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
        $dataApprentice->nombre_completo     = $request->get('nombre_completo');
        $dataApprentice->tipo_documento      = $request->get('tipo_documento');
        $dataApprentice->numero_documento    = $request->get('numero_documento');
        $dataApprentice->direccion           = $request->get('direccion');
        $dataApprentice->barrio              = $request->get('barrio');
        $dataApprentice->estrato             = $request->get('estrato');
        $dataApprentice->telefono            = $request->get('telefono');
        $dataApprentice->email               = $request->get('email');
        $dataApprentice->programa_formacion  = $request->get('programa_formacion');
        $dataApprentice->numero_ficha        = $request->get('numero_ficha');
        $dataApprentice->jornada             = $request->get('jornada');
        $dataApprentice->pregunta1           = $request->get('pregunta1');
        $dataApprentice->pregunta2           = $request->get('pregunta2');
        $dataApprentice->pregunta3           = $request->get('pregunta3');
        $dataApprentice->otro_apoyo          = $request->get('otro_apoyo');
        $dataApprentice->compromiso_informar = $request->get('compromiso_informar');
        $dataApprentice->compromiso_normas   = $request->get('compromiso_normas');
        $dataApprentice->justificacion_suplemento = $request->get('justificacion_suplemento');
        if ($dataApprentice->save()){
            return redirect('/admin/dashboard')->with('status', 'El aprendiz '.$dataApprentice->nombre_completo.' fue adicionado con éxito');
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
        $dataApprentice->tipo_documento        = $request->get('tipo_documento');
        $dataApprentice->numero_documento      = $request->get('numero_documento');
        $dataApprentice->direccion             = $request->get('direccion');
        $dataApprentice->barrio                = $request->get('barrio');
        $dataApprentice->estrato               = $request->get('estrato');
        $dataApprentice->telefono              = $request->get('telefono');
        $dataApprentice->email                 = $request->get('email');
        $dataApprentice->programa_formacion    = $request->get('programa_formacion');
        $dataApprentice->numero_ficha          = $request->get('numero_ficha');
        $dataApprentice->jornada               = $request->get('jornada');
        $dataApprentice->pregunta1             = $request->get('pregunta1');
        $dataApprentice->pregunta2             = $request->get('pregunta2');
        $dataApprentice->pregunta3             = $request->get('pregunta3');
        $dataApprentice->otro_apoyo            = $request->get('otro_apoyo');
        $dataApprentice->compromiso_informar   = $request->get('compromiso_informar');
        $dataApprentice->compromiso_normas     = $request->get('compromiso_normas');
        $dataApprentice->justificacion_suplemento = $request->get('justificacion_suplemento');
        if ($dataApprentice->save()){
            return redirect('/admin/dashboard')->with('status', 'El aprendiz '.$dataApprentice->nombre_completo.' fue modificado con éxito');
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
        return redirect('/admin/dashboard')->with('status', 'El aprendiz fue eliminado con éxito');
    }

    public function solicitudAceptado($id)
    {
        $dataApprentice = Apprentice::find($id);
        $dataApprentice->estado_solicitud = 1;
        if($dataApprentice->save()){
            return redirect('admin/dashboard')->with('status', 'El Aprendiz <strong>'.$dataApprentice->nombre_completo.'</strong>
            fue modificado con exito!');
        }
    }

    public function solicitudRechazado($id)
    {
        Apprentice::destroy($id);
        return redirect('admin/dashboard')->with('status', 'La solicitud del aprendiz fue rechazada!');
    }

    public function obtener_solicitud(Request $id)
    {
        $dataApprentice = Apprentice::find($id);
        return view('apprentices.ajax', compact('dataApprentice'));
    }

    public function entrega_suplemento($id)
    {
        $dataApprentice = Apprentice::find($id);
        $dataApprentice->estado_beneficio = 1;
        if (Auth::check()) {
            if($dataApprentice->save()){
                return redirect('admin/dashboard')->with('status', 'El Aprendiz <strong>'.$dataApprentice->nombre_completo.'</strong>
                ha recibido el suplemento con éxito!');
            }
        }
        else{
            return redirect('/')->with('status', 'El Aprendiz <strong>'.$dataApprentice->nombre_completo.'</strong>
                ha recibido el suplemento con éxito!');
        }
    }

    public function ajax(Request $request)
    {
        $query = Apprentice::numero_documento($request->get('numero_documento'))->get();
        return view('apprentices.documentoajax', compact('query'));
    }

    public function import()
    {
        return view('apprentices.import');
    }
    public function store_import(Request $request)
    {
        if($request->file('imported-file'))
        {
            $path = $request->file('imported-file')->getRealPath();

            $data = Excel::selectSheets('Respuestas de formulario 1')->load($path, function($reader)
            {
            })->get();
            if(!empty($data) && $data->count())
            {
                foreach ($data->toArray() as $row)
                {
                    if(!empty($row))
                    {
                        $compromiso = $row['compromiso_del_aprendiz'];
                        if(isset($compromiso)) {
                            if (strpos($compromiso, 'informar') !== false) {
                                $compromiso_informar = 'si';
                            } else {
                                $compromiso_informar = 'no';
                            }
                            if(strpos($compromiso, 'normas') !== false) {
                                $compromiso_normas = 'si';
                            } else {
                                $compromiso_normas = 'no';
                            }
                        } else {
                            $compromiso_informar = 'no';
                            $compromiso_normas = 'no';
                        }
                        $dataArray[] =
                        [
                            'nombre_completo' => $row['nombre_completo'],
                            'tipo_documento' => $row['tipo_de_documento_de_identidad'],
                            'numero_documento' => $row['numero_de_documento'],
                            'direccion' => $row['direccion'],
                            'barrio' => $row['barrio'],
                            'estrato' => $row['estrato'],
                            'telefono' => $row['telefono'],
                            'email' => $row['email'],
                            'programa_formacion' => $row['programa_de_formacion'],
                            'numero_ficha' => $row['n0_de_ficha'],
                            'jornada' => $row['jornada'],
                            'pregunta1' => $row['de_quien_depende_usted'],
                            'pregunta2' => $row['oficio_que_realiza_de_quien_depende.'],
                            'pregunta3' => $row['tiene_personas_que_dependan_de_usted'],
                            'otro_apoyo' => $row['es_usted_beneficiario_de_algun_apoyo'],
                            'compromiso_informar' => $compromiso_informar,
                            'compromiso_normas' => $compromiso_normas,
                            'justificacion_suplemento' => $row['explique_a_profundidad_por_que_requiere_el_suplemento.'],
                        ];
                    }
                }
                if(!empty($dataArray))
                {
                    Apprentice::insert($dataArray);
                    return redirect('/admin')->with('status', 'Se ha importado el archivo con éxito!');
                }
            }
        }
    }

}
