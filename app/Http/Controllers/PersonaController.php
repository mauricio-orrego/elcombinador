<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidaPersona;
use App\Model\Persona;
use App\Models\Ciudad;
use App\Models\Tipo_doc;
use App\Models\Tipo_per;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        //dd("hola" . $request->get('q'));
        can('crear-persona');
        $tipo_pers = Tipo_per::orderBy('id')->pluck('nombre', 'id')->toArray();
        $tipo_docs = Tipo_doc::orderBy('id')->pluck('nombre', 'id')->toArray();
        $ciudades = Ciudad::orderBy('id')->pluck('nombre', 'id')->toArray();
        $datas = Persona::name($request->get('q'))->orderBy('id', 'DESC')->paginate(); 
        return view('persona.index', compact('datas','tipo_docs','ciudades','tipo_pers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $tipo_pers = Tipo_per::orderBy('id')->pluck('nombre', 'id')->toArray();
        $tipo_docs = Tipo_doc::orderBy('id')->pluck('nombre', 'id')->toArray();
        $ciudades = Ciudad::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view('persona.crear', compact('tipo_pers','tipo_docs','ciudades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidaPersona $request)
    {
        Persona::create($request->all());
        return redirect('persona')->with('mensaje', 'persona creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
    
        $tipo_pers = Tipo_per::orderBy('id')->pluck('nombre', 'id')->toArray();
        $tipo_docs = Tipo_doc::orderBy('id')->pluck('nombre', 'id')->toArray();
        $ciudades = Ciudad::orderBy('id')->pluck('nombre', 'id')->toArray();
        $data = Persona::findOrFail($id);
        return view('persona.editar', compact('data','tipo_pers','tipo_docs','ciudades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidaPersona $request, $id)
    {
        Persona::findOrFail($id)->update($request->all());
        return redirect('persona')->with('mensaje', 'persona actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        if ($request->ajax()){
            if (Persona::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
