<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionEntrada;
use App\Model\Persona;
use App\Models\Bodega;
use App\Models\Categoria;
use App\Models\Ciudad;
use App\Models\Entrada;
use App\Models\Producto;
use App\Models\Tipo_doc;
use App\Models\Tipo_per;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        can('lista-entradas');
        $tipo_docs = Tipo_doc::orderBy('id')->pluck('nombre', 'id')->toArray();
        $ciudades = Ciudad::orderBy('id')->pluck('nombre', 'id')->toArray();
        $datas = Persona::prov($request->get('busprov'))->orderBy('id', 'DESC')->paginate(); 
        return view('entrada.entrada', compact('datas','tipo_docs','ciudades'));
    }

    public function entradaprod(Request $request)
    {
        dd($request);
        //dd($id=($request->entrada_id));
        $id=($request->entrada_id);
        $tipo_docs = Tipo_doc::orderBy('id')->pluck('nombre', 'id')->toArray();
        $bodegas = Bodega::orderBy('id')->pluck('nombre', 'id')->toArray();
        $categorias = Categoria::orderBy('id')->pluck('nombre', 'id')->toArray();    
        $datasprod = Producto::prod($request->get('busprod'))->orderBy('id', 'DESC')->paginate(); 
        $datasent = Entrada::where('id', "$id")->orderBy('id', 'DESC')->paginate(); 
        foreach ($datasent as $dataent)
        $datas = Persona::prov($request->get('busprov'))->where('id', "$dataent->proveedor_id")->paginate(); 
        return view('entrada.validar', compact('datasent','datas','tipo_docs','datasprod','bodegas','categorias'));
    }   


    public function validarx(Request $request)
    {
        $id=($request->id);
        $tipo_docs = Tipo_doc::orderBy('id')->pluck('nombre', 'id')->toArray();
        $bodegas = Bodega::orderBy('id')->pluck('nombre', 'id')->toArray();
        $categorias = Categoria::orderBy('id')->pluck('nombre', 'id')->toArray();    
        $datasprod = Producto::prod($request->get('busprod'))->orderBy('id', 'DESC')->paginate(); 
        $datasent = Entrada::where('id', "$id")->orderBy('id', 'DESC')->paginate(); 
        foreach ($datasent as $dataent)
        $datas = Persona::prov($request->get('busprov'))->where('id', "$dataent->proveedor_id")->paginate(); 
        return view('entrada.validar', compact('datasent','datas','tipo_docs','datasprod','bodegas','categorias'));
    }
    
    public function validar(Request $request)
    {
        Entrada::create($request->all());
        $factura=($request->factura);
        $proveedor_id=($request->proveedor_id);
        $datasent = Entrada::where('proveedor_id', "$proveedor_id")->where('factura', "$factura")->orderBy('id', 'DESC')->paginate(); 
        return view('entrada.index', compact('datasent'));
    }
    
    public function nueva(Request $request, $id)
    {
        can('lista-entradas');
        $tipo_docs = Tipo_doc::orderBy('id')->pluck('nombre', 'id')->toArray();
        $datas = Persona::prov($request->get('busprov'))->where('id', "$id")->paginate(); 
        return view('entrada.entradafec', compact('datas','tipo_docs'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $proveedores = Persona::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view('producto.crear', compact('bodegas','proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionEntrada $request)
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
        $proveedores = Persona::orderBy('id')->pluck('nombre', 'id')->toArray();
        $data = Entrada::findOrFail($id);
        return view('entrada.editar', compact('data','proveedores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionEntrada $request, $id)
    {
        Entrada::findOrFail($id)->update($request->all());
        return redirect('entrada')->with('mensaje', 'Entrada actualizada con exito');
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
            if (Entrada::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}