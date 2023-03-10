<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class clientesController extends Controller
{
     public function index()
    {
        //paginar el listado con paginate
        $clientes = User::clientes()->paginate(10);
        return view('clientes.index',compact('clientes'));
    }

    public function create()
    {
        return view('clientes.crear');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'FechaNac' => 'required',

        ];

        $msg = [
            'name.required' => 'El nombre del cliente es obligatorio',
            'name.min' => 'Minimo 3 caracteres el nombre',
            'email.required' => 'El correo electronico es obligatorio',
            'email.email' => 'Ingresa una dirección valida',
        ];
        $this->validate($request,$rules,$msg);

        User::create(
            $request->only('name', 'apellido', 'email','tlf', 'FechaNac')   + [
                'role' => 'clientes',
                'password' => bcrypt($request->input('password'))
            ]
        );

        $notificacion = 'El cliente se ha creado correctamente.';
        return redirect('/clientes')->with(compact('notificacion'));
    }

    public function show()
    {
    
    }

    
    public function edit($id)
    {
        $clientes = User::clientes()->findOrFail($id); 
        return view('clientes.editar',compact('clientes'));
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
        $user = User::clientes()->findOrFail($id);

        $data = $request->only('name', 'apellido', 'email', 'FechaNac','tlf');
        $password = $request->input('password');

        //guardamos el password encriptado en data
        if($password)
        $data['password'] = bcrypt($password);

        $user->fill($data);
        $user->save();

        $notificacion = 'La informacion del entrenador se actualizo correctamente';
        return redirect('/clientes')->with('notificacion');
    }

    public function destroy($id)
    {
        $user = User::clientes()->findOrFail($id);
        $user->delete();

        return redirect('/clientes');
    }
}
