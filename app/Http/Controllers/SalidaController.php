<?php

namespace App\Http\Controllers;

use App\Http\Requests\Validacionsalida;
use App\Model\Persona;
use App\Models\Bodega;
use App\Models\Categoria;
use App\Models\Ciudad;
use App\Models\salida;
use App\Models\salida_prod;
use App\Models\Producto;
use App\Models\Tipo_doc;
use Illuminate\Http\Request;

class salidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        can('listar-salidas');
        $tipo_docs = Tipo_doc::orderBy('id')->pluck('nombre', 'id')->toArray();
        $ciudades = Ciudad::orderBy('id')->pluck('nombre', 'id')->toArray();
        $datas = Persona::clie($request->get('busprov'))->orderBy('id', 'DESC')->paginate(10); 
        return view('salida.salida', compact('datas','tipo_docs','ciudades'));
    }

    public function salidaprod(Request $request)
    {
        salida_prod::create($request->all());
        $id=($request->salida_id);
        $tipo_docs = Tipo_doc::orderBy('id')->pluck('nombre', 'id')->toArray();
        $bodegas = Bodega::orderBy('id')->pluck('nombre', 'id')->toArray();
        $categorias = Categoria::orderBy('id')->pluck('nombre', 'id')->toArray();    
        //para la busqueda de productos
        $datasprod = Producto::prod($request->get('busprod'))->orderBy('id', 'DESC')->paginate(); 
        //datos de la salida
        $datasent = salida::where('id', "$id")->orderBy('id', 'DESC')->paginate(); 
        foreach ($datasent as $dataent)
        $datas = Persona::clie($request->get('busprov'))->where('id', "$dataent->cliente_id")->paginate(); 
        //productos de salida
        $datasprodsalida = salida_prod::where('salida_id', "$id")->orderBy('id', 'DESC')->paginate(); 
        //infoemacion sobre productos
        $datasprodtodos = Producto::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view('salida.validar', compact('datasprodtodos','datasprodsalida','datasent','datas','tipo_docs','datasprod','bodegas','categorias'));
    }   
    
    public function validarx(Request $request)
    {
        $id=($request->id);
        $tipo_docs = Tipo_doc::orderBy('id')->pluck('nombre', 'id')->toArray();
        $bodegas = Bodega::orderBy('id')->pluck('nombre', 'id')->toArray();
        $categorias = Categoria::orderBy('id')->pluck('nombre', 'id')->toArray();    
        //para la busqueda de productos
        $datasprod = Producto::prod($request->get('busprod'))->orderBy('id', 'DESC')->paginate(); 
        //datos de la salida
        $datasent = salida::where('id', "$id")->orderBy('id', 'DESC')->paginate(); 
        foreach ($datasent as $dataent)
        $datas = Persona::clie($request->get('busprov'))->where('id', "$dataent->cliente_id")->paginate(); 
        $datasprodsalida = salida_prod::where('salida_id', "$id")->orderBy('id', 'DESC')->paginate(); 
        //infoemacion sobre productos
        $datasprodtodos = Producto::orderBy('id')->pluck('nombre', 'id')->toArray();
        //dd($datasprodtodos);
        return view('salida.validar', compact('datasprodtodos','datasprodsalida','datasent','datas','tipo_docs','datasprod','bodegas','categorias'));
    }   
    
    
    public function validar(Validacionsalida $request)
    {
        salida::create($request->all());
        $factura=($request->factura);
        $cliente_id=($request->cliente_id);
        $datasent = salida::where('cliente_id', "$cliente_id")->where('factura', "$factura")->orderBy('id', 'DESC')->paginate(); 
        return view('salida.index', compact('datasent'));
    }
    
    public function nueva(Request $request, $id)
    {
        can('lista-salidas');
        $tipo_docs = Tipo_doc::orderBy('id')->pluck('nombre', 'id')->toArray();
        $datas = Persona::clie($request->get('busprov'))->where('id', "$id")->paginate(); 
        return view('salida.salidafec', compact('datas','tipo_docs'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $clientees = Persona::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view('producto.crear', compact('bodegas','clientees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Validacionsalida $request)
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
        $clientees = Persona::orderBy('id')->pluck('nombre', 'id')->toArray();
        $data = salida::findOrFail($id);
        return view('salida.editar', compact('data','clientees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Validacionsalida $request, $id)
    {
        salida::findOrFail($id)->update($request->all());
        return redirect('salida')->with('mensaje', 'salida actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request)
    {
        $idprod=($request->idprod);
        $id=($request->id);
        salida_prod::findOrFail($idprod)->delete($request->all());
        $tipo_docs = Tipo_doc::orderBy('id')->pluck('nombre', 'id')->toArray();
        $bodegas = Bodega::orderBy('id')->pluck('nombre', 'id')->toArray();
        $categorias = Categoria::orderBy('id')->pluck('nombre', 'id')->toArray();    
        //para la busqueda de productos
        $datasprod = Producto::prod($request->get('busprod'))->orderBy('id', 'DESC')->paginate(); 
        //datos de la salida
        $datasent = salida::where('id', "$id")->orderBy('id', 'DESC')->paginate(); 
        foreach ($datasent as $dataent)
        $datas = Persona::clie($request->get('busprov'))->where('id', "$dataent->cliente_id")->paginate(); 
        $datasprodsalida = salida_prod::where('salida_id', "$id")->orderBy('id', 'DESC')->paginate(); 
        //infoemacion sobre productos
        $datasprodtodos = Producto::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view('salida.validar', compact('datasprodtodos','datasprodsalida','datasent','datas','tipo_docs','datasprod','bodegas','categorias'))->with('mensaje', 'Producto borrado con exito');
    }   
    
    public function finsalida(Request $request)
    {
        $id=($request->id);
        $total=($request->total);
        $affectedRows = salida::where('id', "$id")->update(array('valor' => $total));
        can('lista-salidas');
        $tipo_docs = Tipo_doc::orderBy('id')->pluck('nombre', 'id')->toArray();
        $ciudades = Ciudad::orderBy('id')->pluck('nombre', 'id')->toArray();
        $datas = Persona::clie($request->get('busprov'))->orderBy('id', 'DESC')->paginate(); 
        return view('salida.salida', compact('datas','tipo_docs','ciudades'))->with('mensaje', 'salida almacenada con exito');
    }
}