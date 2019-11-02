@extends("theme.$theme.layout")
@section('titulo')
Salidas
@endsection
@section("scripts")
<script src="{{asset("assets/pages/scripts/salida/crear.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/index.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.mensaje')
        <div class="box">
            <div class="box-header with-border">
            <h1 class="title text-center"><strong>Salidas</strong> </h1>
            </div>
            <form action="{{route('validar_salida')}}" id="form-general" class="form-horizontal" method="get" autocomplete="off">      
                @csrf
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <tr>
                        <td valign="top" width="50%">
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <tbody>
                        @foreach ($datas as $data)
                         <tr><td colspan="2"> <h3 class="box-title"><b>Proveedor</b></h3></td></tr>
                         <tr><td><label for="nombre" class="col-lg-3 control-label">Nombre:</label></td><td>{{$data->nombre}} {{$data->apellido}}</td></tr>
                         <tr><td><label for="documento" class="col-lg-3 control-label">Documento:</label></td><td>{{$tipo_docs[$data->tipo_doc_id]}} {{$data->documento}}-{{$data->dv}}</td></tr>
                         <tr><td><label for="direccion" class="col-lg-3 control-label">Direccion:</label></td><td>{{$data->direccion}}</td></tr>
                         <tr><td><label for="telefono" class="col-lg-3 control-label">Telefono:</label></td><td>{{$data->telefono}}</td></tr>
                         </tr>
                        @endforeach
                    </table>
                    </td>   
                    <td>
                    <table class="table table-striped table-bordered table-hover" id="tabla-data">
                        <tr><td colspan="2"> <h3 class="box-title"><b>Documento</b></h3></td></tr>
                        <tr><td><label for="factura" class="col-md-9 control-label requerido">Numero factura</label></td>
                            <td><input type="text" name="factura" id="factura" class="form-control" value="{{ old('factura') }}" required autofocus></td>
                            <input type="hidden" name="proveedor_id" id="proveedor_id" class="form-control" value="{{$data->id}}" required>
                        </tr>
                        <tr>
                            <td><label for="fecha" class="col-lg-5 control-label">Fecha</label></td>
                            <td><input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo date("Y-m-d");?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="fecha" class="col-lg-10 control-label">Fecha Vencimiento</label></td><td>
                            <input type="date" class="form-control" id="fecha_venci" name="fecha_venci" value="<?php echo date("Y-m-d");?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="fecha" class="col-lg-9 control-label requerido">Forma de pago</label></td><td>
                                <select class="form-control" id="forma_pago" name="forma_pago"  value="{{ old('forma_pago') }}" required>
                                <option value="Contado">Contado</option>
                                <option value="Tdebito">Tarjeta debito</option>
                                <option value="Tcredit">Tarjeta credito</option>
                                <option value="Credito">Credito</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                    </table>
                    </td>
                    </tr>
                </table>
            </div>
        </div>
    <div class="box-footer">
       <div class="col-lg-5"></div>
         <div class="col-lg-3">
             @include('includes.boton-form-crear')
         </div>
     </div>
            </div>
</form>
@endsection
