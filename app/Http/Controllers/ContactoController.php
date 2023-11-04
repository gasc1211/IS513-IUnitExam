<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    //

    public function create(Request $request, $codigoEntrada) {
        return view("agregarcontacto", compact("codigoEntrada"));
    }

    public function insert(Request $request){
        $newContacto = new Contacto();
        $newContacto->codigoEntrada = $request->input('codigoEntrada');
        $newContacto->nombre = $request->input('nombre');
        $newContacto->apellido = $request->input('apellido');
        $newContacto->telefono = $request->input('telefono');
        $newContacto->save();

        return redirect(route('directorio.inicio'));
    }

    public function delete($id){
        $contacto = Contacto::find($id);
        $contacto->delete();
        return redirect()->back()->with("success","true");
    }
}
