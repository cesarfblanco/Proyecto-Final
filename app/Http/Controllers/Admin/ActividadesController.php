<?php

namespace App\Http\Controllers\Admin;

use App\Models\Actividades;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActividadesController extends Controller
{
    

    //listar actividades... compact sirve para usar la variable en la vista
    public function index(){
        $actividad = Actividades::all();
        return view('actividades.index', compact('actividad'));
    }

    public function crear(){
        return view('actividades.crear');
    }

    //con el eloquent creamos la actividad directamente en la bbdd con save y hacemos las comprobaciones
    public function enviar(Request $request){
        //nombre requerido minimo tres caracteres
        $reglas = [
            'name' => 'required|min:3'
        ];

        $mensajes = [
            'name.required' => 'El nombre de la actividad es obligatorio',
            'name.min' => 'El nombre debe tener como minimo tres caracteres'
        ];
        $this->validate($request,$reglas,$mensajes);
        $actividad = new Actividades();
        $actividad->name = $request->input('name');
        $actividad->description = $request->input('descripcion');
        $actividad->horario = $request->input('horario');
        $actividad->save();
        $msg = 'Actividad creada correctamente';

        return redirect('/actividades')->with(compact('msg'));
    }

    public function actualizar(Request $request,Actividades $actividad){
        //nombre requerido minimo tres caracteres
        $reglas = [
            'name' => 'required|min:3'
        ];

        $mensajes = [
            'name.required' => 'El nombre de la actividad es obligatorio',
            'name.min' => 'El nombre debe tener como minimo tres caracteres'
        ];

        $this->validate($request,$reglas,$mensajes);
        
        $actividad->name = $request->input('name');
        $actividad->description = $request->input('descripcion');
        $actividad->horario = $request->input('horario');
        $actividad->save();
        $msg = 'Actividad actualizada correctamente';


        return redirect('/actividades')->with(compact('msg'));
    }
    

    public function editar(Actividades $actividad){

        return view('actividades.editar',compact('actividad'));
    }

    public function eliminar(Actividades $actividad){
        $actividad->delete();
        $msg = 'Actividad eliminada correctamente';

        return redirect('/actividades')->with(compact('msg'));
    }
}
