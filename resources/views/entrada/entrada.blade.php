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
            <h1 class="title text-center"><strong>Entradas</strong> </h1>
                <h3 class="box-title">Seleccione proveedor</h3>
            </div>
            <div class="box-body">
            <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="busprov" class="form-control" placeholder="Buscar...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>

                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Dirección</th>
                            <th>Ciudad</th>
                            <th>Telefono</th>
                            <th>Celular</th>
                            <th colspan='2' class="width70"></th>
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
                            <td>
                                <a href="{{route('nueva_entrada', ['id' => $data->id])}}" class="btn-accion-tabla tooltipsC" title="Realizar entrada">
                                    <i class="fa fa-fw fa-pencil">Seleccionar</i>
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
