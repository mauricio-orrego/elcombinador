@extends("theme.$theme.layout")
@section('titulo')
Proveedores y Clientes
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
<div class="row">
    <div class="col-lg-12">
        @include('includes.mensaje')
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Proveedores y Clientes</h3>
                <div class="box-tools pull-right">
                    <a href="{{route('crear_persona')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
                </div>
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
                            <th>Tipo</th>
                            <th class="width70"></th>
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
                            <td>{{$tipo_pers[$data->tipo_per_id]}}</td>
                            <td>
                                <a href="{{route('editar_persona', ['id' => $data->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                    <i class="fa fa-fw fa-pencil"></i>
                                </a>
                                <form action="{{route('eliminar_persona', ['id' => $data->id])}}" class="d-inline form-eliminar" method="POST">
                                    @csrf @method("delete")
                                    <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este registro">
                                        <i class="fa fa-fw fa-trash text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
