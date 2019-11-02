<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionProducto;
use App\Models\Bodega;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        can('crear-producto');
        $categorias = Categoria::orderBy('id')->pluck('nombre', 'id')->toArray();
        $bodegas = Bodega::orderBy('id')->pluck('nombre', 'id')->toArray();
        //para la busqueda de productos
        $datas = Producto::prod($request->get('busprod'))->orderBy('nombre', 'ASC')->paginate(14); 
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
        return redirect('producto')->with('mensaje', 'Producto creado con exito');
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
    public function eliminar($request)
    {     
        Producto::destroy($request);
        return redirect('producto')->with('mensaje', 'Producto borrado con exito');
    }
}
