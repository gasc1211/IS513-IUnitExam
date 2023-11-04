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

    public function insert(Request $request){
        $directorio = new Directorio();
        $directorio->codigoEntrada = $request->input('codigoEntrada');
        $directorio->nombre = $request->input('nombre');
        $directorio->apellido = $request->input('apellido');
        $directorio->correo = $request->input('correo');
        $directorio->telefono = $request->input('telefono');
        $directorio->save();

        return redirect(route('directorio.inicio'));
    }
    public function search(){
        return view('buscar');
    }
    public function find(Request $request){
        $directorios = Directorio::where('correo', $request->input('correo'))
                                    ->get();
        $directorio = $directorios[0];
        $contactos = Contacto::where('codigoEntrada', $directorio->codigoEntrada)
                                ->get();
        return view('vercontactos', compact('directorio', 'contactos'));
    }
    public function view($directorio){
        $contactos = Contacto::where('codigoEntrada', $directorio->codigoEntrada)
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
