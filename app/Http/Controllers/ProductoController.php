<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionProducto;
use App\Models\Bodega;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\admin\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        can('crear-producto');
        $categorias = Categoria::orderBy('id')->pluck('nombre', 'id')->toArray();
        $bodegas = Bodega::orderBy('id')->pluck('nombre', 'id')->toArray();
        $datas = Producto::orderBy('id')->get();
        return view('producto.index', compact('datas','bodegas','categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $bodegas = Bodega::orderBy('id')->pluck('nombre', 'id')->toArray();
        $categorias = Categoria::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view('producto.crear', compact('bodegas','categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionProducto $request)
    {
        Producto::create($request->all());
        return redirect('producto')->with('mensaje', 'Producto creada con exito');
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
        
        $bodegas = Bodega::orderBy('id')->pluck('nombre', 'id')->toArray();
        $categorias = Categoria::orderBy('id')->pluck('nombre', 'id')->toArray();
        $data = Producto::findOrFail($id);
        return view('producto.editar', compact('data','bodegas','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionProducto $request, $id)
    {
        Producto::findOrFail($id)->update($request->all());
        return redirect('producto')->with('mensaje', 'Producto actualizado con exito');
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
            if (Producto::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
