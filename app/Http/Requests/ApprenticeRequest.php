<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
       if ($this->method()=='PUT') {
           return [
              'nombre_completo'=>'required',
              'tipo_documento'=>'required',
              'numero_documento'=>'required',
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
       else {
           return [
              'nombre_completo'=>'required',
              'tipo_documento'=>'required',
              'numero_documento'=>'required',
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
              'compromiso_informar'=>'required',
              'compromiso_normas'=>'required',
              'justificacion_suplemento'=>'required',
              
           ];
       }
   }
   public function messages()
   {
        return [
           'nombre_completo.required'=>'El campo nombre completo es requerido',
           'tipo_documento.required'=>'El campo tipo de documento es requerido',
           'numero_documento.required'=>'El campo numero de documento es requerido',
           'direccion.required'=>'El campo direccion es requerido',
           'barrio.required'=>'El campo barrio es requerido',
           'estrato.required'=>'El campo estrato es requerido',
           'email.required'=>'El campo correo electrónico es requerido',
           'email.unique'=>'Este correo electrónico ya existe',
           'programa_formacion.required'=>'El campo programa de formacion es requerido',
           'numero_ficha.required'=>'El campo numero_ficha es requerido',
           'jornada.required'=>'El campo jornada es requerido',
           'pregunta1.required'=>'Este campo es requerido',
           'pregunta1.required'=>'Este campo es requerido',
           'pregunta3.required'=>'Este campo es requerido',
           'otro_apoyo.required'=>'Este campo es requerido',
           'justificacion_suplemento.required'=>'Este campo es requerido',
       ];
   }
}
