<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Apprentice;

class ApprenticeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
   {
        // $apprentice = Apprentice::find($this->apprentices->id);

        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'nombre_completo'=>'required',
                    'tipo_documento'=>'required',
                    'numero_documento'=>'required|unique:apprentices',
                    'direccion'=>'required',
                    'barrio'=>'required',
                    'estrato'=>'required',
                    'email'=>'required|unique:apprentices',
                    'programa_formacion'=>'required',
                    'numero_ficha'=>'required',
                    'jornada'=>'required',
                    'pregunta1'=>'required',
                    'pregunta2'=>'required',
                    'pregunta3'=>'required',
                    'otro_apoyo'=>'required',
                    'justificacion_suplemento'=>'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'nombre_completo'=>'required',
                    'tipo_documento'=>'required',
                    'numero_documento'=>'required|unique:apprentices,id,:id',
                    'direccion'=>'required',
                    'barrio'=>'required',
                    'estrato'=>'required',
                    'email'=>'required|unique:apprentices,id,:id',
                    'programa_formacion'=>'required',
                    'numero_ficha'=>'required',
                    'jornada'=>'required',
                    'pregunta1'=>'required',
                    'pregunta2'=>'required',
                    'pregunta3'=>'required',
                    'otro_apoyo'=>'required',
                    'justificacion_suplemento'=>'required',
                ];
            }
            default:break;
        }
   }
   public function messages()
   {
        return [
           'nombre_completo.required'=>'El campo nombre completo es requerido',
           'tipo_documento.required'=>'El campo tipo de documento es requerido',
           'numero_documento.required'=>'El campo número de documento es requerido',
           'numero_documento.unique'=>'Este número de documento ya existe',
           'direccion.required'=>'El campo dirección es requerido',
           'barrio.required'=>'El campo barrio es requerido',
           'estrato.required'=>'El campo estrato es requerido',
           'email.required'=>'El campo correo electrónico es requerido',
           'email.unique'=>'Este correo electrónico ya existe',
           'programa_formacion.required'=>'El campo programa de formación es requerido',
           'numero_ficha.required'=>'El campo número de ficha es requerido',
           'jornada.required'=>'El campo jornada es requerido',
           'pregunta1.required'=>'Este campo es requerido',
           'pregunta2.required'=>'Este campo es requerido',
           'pregunta3.required'=>'Este campo es requerido',
           'otro_apoyo.required'=>'Este campo es requerido',
           'justificacion_suplemento.required'=>'Este campo es requerido',
       ];
   }
}
