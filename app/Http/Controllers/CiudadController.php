<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionCiudad;
use App\Models\Ciudad;
use App\Models\Depto;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deptos = Depto::orderBy('id')->pluck('nombre', 'id')->toArray();
        $datas = Ciudad::orderBy('id')->get();
        return view('ciudad.index', compact('datas','deptos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $deptos = Depto::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view('ciudad.crear', compact('deptos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionCiudad $request)
    {
        Ciudad::create($request->all());
        return redirect('ciudad')->with('mensaje', 'Ciudad creada con exito');
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
        $deptos = Depto::orderBy('id')->pluck('nombre', 'id')->toArray();
        $data = Ciudad::findOrFail($id);
        return view('ciudad.editar', compact('data','deptos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionCiudad $request, $id)
    {
        Ciudad::findOrFail($id)->update($request->all());
        return redirect('ciudad')->with('mensaje', 'Ciudad actualizada con exito');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        if($request->ajax()) {
            if (Ciudad::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }

}
