<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class entrenadorController extends Controller
{
    
    public function index()
    {
        $entrenadores = User::entrenadores()->paginate(10);
        return view('entrenadores.index',compact('entrenadores'));
    }

    
    public function create()
    {
        return view('entrenadores.crear');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'FechaNac' => 'required',

        ];

        $msg = [
            'name.required' => 'El nombre del entrenador es obligatorio',
            'name.min' => 'Minimo 3 caracteres el nombre',
            'email.required' => 'El correo electronico es obligatorio',
            'email.email' => 'Ingresa una dirección valida',
        ];
        $this->validate($request,$rules,$msg);

        User::create(
            $request->only('name', 'apellido', 'email', 'FechaNac')
        );
    }

    public function show($id)
    {
    }

   
    public function edit($id)
    {
        
        $entrenadores = User::entrenadores()->findOrFail($id); 
        return view('entrenadores.editar',compact('entrenadores'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'FechaNac' => 'required',

        ];

        $msg = [
            'name.required' => 'El nombre del entrenador es obligatorio',
            'name.min' => 'Minimo 3 caracteres el nombre',
            'email.required' => 'El correo electronico es obligatorio',
            'email.email' => 'Ingresa una dirección valida',
        ];
        $this->validate($request,$rules,$msg);
        $user = User::entrenadores()->findOrFail($id);

        $data = $request->only('name', 'apellido', 'email', 'FechaNac');
        $password = $request->input('password');
        if($password)
        $data['password'] = bcrypt($password);

        $user->fill($data);
        $user->save();

        $notificacion = 'La informacion del entrenador se actualizo correctamente';
        return redirect('/entrenadores')->with('notificacion');
    }

    
    public function destroy($id)
    {
        $user = User::entrenadores()->findOrFail($id);
        $user->delete();

        return redirect('/entrenadores');

    }
}
