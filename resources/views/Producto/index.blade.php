@extends("theme.$theme.layout")
@section('titulo')
Productos
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
                <h3 class="box-title">Productos</h3>
                <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                        <input type="text" name="busprod" class="form-control" placeholder="Buscar..." autofocus>
                        <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>  
            </div>
         </form>
                  <div class="box-tools pull-right">
                    <a href="{{route('crear_producto')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Costo</th>
                            <th>Valor venta</th>
                            <th>Bodega</th>
                            <th>Categoria</th>
                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{$data->nombre}}</td>
                            <td>{{$data->costo}}</td>
                            <td>{{$data->valorventa}}</td>
                            <td>{{$bodegas[$data->bodega_id]}}</td>
                            <td>{{$categorias[$data->categoria_id]}}</td>
                            <td>
                                <a href="{{route('editar_producto', ['id' => $data->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                   <i class="fa fa-fw fa-pencil"></i>
                                </a>
                                <a href="{{route('eliminar_producto', ['id' => $data->id])}}" class="btn-accion-tabla tooltipsC" title="Borrar este registro" OnClick="if (! confirm('Esta seguro de borrar este producto')) return false;">
                                <i class="fa fa-fw fa-trash text-danger"></i>
                                   @csrf @method("get")
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $datas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
