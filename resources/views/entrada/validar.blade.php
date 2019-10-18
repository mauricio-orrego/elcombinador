@extends("theme.$theme.layout")
@section('titulo')
Entradas
@endsection
@section("scripts")
<script src="{{asset("assets/pages/scripts/index.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')           
<div class="row">
    <div class="col-lg-12">
        @include('includes.mensaje')
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Entradas</h3>
            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Factura Nro</th>
                            <th>Fecha</th>
                            <th>Fecha Ven</th>
                            <th>Forma Pago</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        @foreach ($datasent as $dataent)
                        <tr>
                            <td>{{$data->nombre}} {{$data->apellido}}</td>
                            <td>{{$tipo_docs[$data->tipo_doc_id]}} {{$data->documento}}-{{$data->dv}}</td>
                            <td>{{$dataent->factura}}</td>
                            <td>{{$dataent->fecha}}</td>
                            <td>{{$dataent->fecha_venci}}</td>
                            <td>{{$dataent->forma_pago}}</td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        @include('includes.mensaje')
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Producto</h3>
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                        <input type="hidden" name="id" id="id" class="form-control" value="{{$dataent->id}}">
                        <input type="text" name="busprod" class="form-control" placeholder="Buscar..." autofocus>
                        <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>  
            </div>
         </form>
     </div>
<!-- modal   --> 
  <div class="modal" tabindex="-1" role="dialog" id="modal1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <h4 class="modal-title">Productos</h4>
        </div>
       <!-- body modal   -->
       <form action="{{route('entradaprod_entrada')}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
                @csrf
        <div class="modal-body">
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Bodega</th>
                            <th>Categoria</th>
                            <th>Cantidad</th>
                            <th>Costo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datasprod as $dataprod)
                        <tr>
                            <td>{{$dataprod->nombre}}</td>
                            <td>{{$bodegas[$dataprod->bodega_id]}}</td>
                            <td>{{$categorias[$dataprod->categoria_id]}}</td>
                            <td><input type="hidden" name="entrada_id" id="entrada_id" size="1" value="{{$dataent->id}}">
                                <input type="hidden" name="producto_id" id="producto_id" size="1" value="{{$dataprod->id}}">
                                <input type="text" name="cantidad" id="cantidad" size="1" value="1" autofocus>
                            <td><input type="text" name="valor" id="valor" size="1" value="{{$dataprod->costo}}"></td>
                            <td><a href="{{route('entradaprod_entrada', ['id' => $dataent->id])}}" >
                           <button type="sumbit" class="btn btn-default" autofocus>Agregar</button></a>
                        </td>
                     </tr>
                   @endforeach
                 </tbody>
              </table>
            </div>
            <!-- footer modal -->
          <div class="modal-footer">
          <a href="{{route('validarx_entrada', ['id' => $dataent->id])}}" >
          <button type="button" class="btn btn-default" autofocus>Cerrar</button></a>
        </div>
     </div>
  </div>
</div>
@endsection