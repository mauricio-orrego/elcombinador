@extends("theme.$theme.layout")
@section('titulo')
Entradas
@endsection
@section("scripts")
<script src="{{asset("assets/pages/scripts/entrada/crear.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.mensaje')
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><b>Proveedor</b></h3>
            </div>
            <form action="{{route('validar_entrada')}}" id="form-general" class="form-horizontal" method="get" autocomplete="off">      
                @csrf
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Dirección</th>
                            <th>Telefono</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{$data->nombre}} {{$data->apellido}}</td>
                            <td>{{$tipo_docs[$data->tipo_doc_id]}} {{$data->documento}}-{{$data->dv}}</td>
                            <td>{{$data->direccion}}</td>
                            <td>{{$data->telefono}}</td>
                             </tr>
                        @endforeach
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                          <td colspan="2"><div class="form-group">
                            <label for="factura" class="col-lg-3 control-label requerido">Numero factura</label>
                            <div class="col-lg-8">
                            <input type="hidden" name="proveedor_id" id="proveedor_id" class="form-control" value="{{$data->id}}" required>
                                <input type="text" name="factura" id="factura" class="form-control" required autofocus>
                            </div>
                        </div></td><td colspan="2"></td>
                        </tr>
                        <tr>
                          <td colspan="2"><div class="form-group">
                            <label for="fecha" class="col-lg-3 control-label requerido">Fecha</label>
                            <div class="col-lg-8">
                            <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo date("Y-m-d");?>" required>
                            </div>
                        </div></td><td colspan="2"></td>
                        </tr>
                        <tr>
                          <td colspan="2"><div class="form-group">
                            <label for="fecha" class="col-lg-3 control-label requerido">Fecha Vencimiento</label>
                            <div class="col-lg-8">
                            <input type="date" class="form-control" id="fecha_venci" name="fecha_venci" value="<?php echo date("Y-m-d");?>" required>
                            </div>
                        </div></td><td colspan="2"></td>
                        </tr><tr>
                        <td colspan="2"><div class="form-group">
                            <label for="fecha" class="col-lg-3 control-label requerido">Forma de pago</label>
                            <div class="col-lg-8">
                                <select class="form-control" id="forma_pago" name="forma_pago" required>
                                <option value=""></option>
                                <option value="Contado">Contado</option>
                                <option value="Credito">Credito</option>
                                </select>
                                </td><td colspan="2">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <div class="box-footer">
       <div class="col-lg-3"></div>
         <div class="col-lg-6">
             @include('includes.boton-form-crear')
         </div>
     </div>
            </div>
</form>
@endsection
