<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PasswordRequest;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Excel;
use App\Apprentice;
use Illuminate\Support\Facades\Schema;
use App\History_Record;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.dashboard');
    }
    public function password(){
        return View('admins.password');
    }

    public function updatePassword(PasswordRequest $request){
        $admin = Auth::User();
        if (Hash::check($request->mypassword, $admin->password)){
            $admin2 = new User();
            $admin2->where('email', '=', $admin->email)
                 ->update(['password' => bcrypt($request->password)]);
            return redirect('admin')->with('status', 'Contraseña cambiada con éxito');
        }
        else
        {
            return redirect('admin/password')->with('message', 'Su contraseña actual es incorrecta');
        }
    }
    public function import(Request $request)
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
    public function truncateall()
    {
        Schema::disableForeignKeyConstraints();
        Apprentice::truncate();
        History_Record::truncate();
        Schema::enableForeignKeyConstraints();

        return redirect('/admin')->with('status', 'Todos los registros de los aprendices fueron eliminados con éxito!');
    }
}
