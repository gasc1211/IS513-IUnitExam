<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Directorio;
use Illuminate\Http\Request;

class DirectorioController extends Controller
{
    //
    public function index(){
        $directorios = Directorio::all();
        return view('directorio', compact('directorios'));
    }

    public function create(){
        return view("crearEntrada");
    }

    public function insertar(Request $request){
        $directorio = new Directorio();
        $directorio->codigoEntrada = $request->codigoEntrada;
        $directorio->nombre = $request->nombre;
        $directorio->apellido = $request->apellido;
        $directorio->correo = $request->correo;
        $directorio->telefono = $request->telefono;
        $directorio->save();

        return redirect(route('directorio.inicio'));
    }

    public function search(Request $request, $id){
        $directorio = Contacto::find( $id );
        return view('buscar', compact('contacto'));
    }
    public function view($id){
        $contactos = Contacto::where('codigoEntrada', $id)
                                ->get();
        return view('vercontactos', compact('contactos'));
    }

    public function deletion(Request $request, $id){
        $contactos = Contacto::where('codigoEntrada', $id)
                                ->get();
        return view('eliminar', compact('id', 'contactos'));
    }

    public function delete(Request $request, $id){
        $directorio = Directorio::find( $id );
        $contactos = Contacto::where('codigoEntrada', $id)
                                ->get();
        foreach ($contactos as $contacto) {
            $contacto->delete();
        }
        $directorio->delete();

        return redirect(route('directorio.inicio'));
    }

}
