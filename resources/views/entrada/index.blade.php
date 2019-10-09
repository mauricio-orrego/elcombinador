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
                            <th>Dirección</th>
                            <th>Ciudad</th>
                            <th>Telefono</th>
                            <th>Celular</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{$data->nombre}} {{$data->apellido}}</td>
                            <td>{{$tipo_docs[$data->tipo_doc_id]}} {{$data->documento}}-{{$data->dv}}</td>
                            <td>{{$data->direccion}}</td>
                            <td>{{$ciudades[$data->ciudad_id]}}</td>
                            <td>{{$data->telefono}}</td>
                            <td>{{$data->celular}}</td>
                        </tr>
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
            <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
            <h4 class="modal-title">Productos</h4>
        </div>
       <!-- body modal   -->
        <div class="modal-body">
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Valor venta</th>
                            <th>Bodega</th>
                            <th>Categoria</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datasprod as $dataprod)
                        <tr>
                            <td>{{$dataprod->nombre}}</td>
                            <td>{{$dataprod->valorventa}}</td>
                            <td>{{$bodegas[$dataprod->bodega_id]}}</td>
                            <td>{{$categorias[$dataprod->categoria_id]}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- footer modal -->
            <div class="modal-footer">
            <a href="{{route('nueva_entrada', ['id' => $data->id])}}" class="btn btn-block btn-info btn-sm">
            <button type="button" class="btn btn-default" autofocus>Cerrar</button></a>
            </div>
        </div>
    </div>
  </div>
@endsection