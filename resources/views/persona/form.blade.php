<div class="form-group">
    <label for="tipo_per_id" class="col-lg-3 control-label requerido">Tipo Persona</label>
    <div class="col-lg-8">
        <select name="tipo_per_id" id="tipo_per_id" class="form-control" unique required>
            @foreach($tipo_pers as $id => $nombre)
                <option value="{{$id}}" {{old("tipo_per_id", $data->$id ?? "") == $id ? "selected" : ""}}>{{$nombre}}</option>
                @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
    <div class="col-lg-8">
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $data->nombre ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="apellido" class="col-lg-3 control-label requerido">Apellido</label>
    <div class="col-lg-8">
        <input type="text" name="apellido" id="apellido" class="form-control" value="{{old('apellido', $data->apellido ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="tipo_doc_id" class="col-lg-3 control-label requerido">Tipo de documento</label>
    <div class="col-lg-8">
        <select name="tipo_doc_id" id="tipo_doc_id" class="form-control" unique required>
            @foreach($tipo_docs as $id => $nombre)
                <option value="{{$id}}" {{old("tipo_doc_id", $data->$id ?? "") == $id ? "selected" : ""}}>{{$nombre}}</option>
                @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="documento" class="col-lg-3 control-label requerido">Documento</label>
    <div class="col-lg-8">
        <input type="text" name="documento" id="documento" class="form-control" value="{{old('documento', $data->documento ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="dv" class="col-lg-3 control-label">DV</label>
    <div class="col-lg-8">
        <input type="text" name="dv" id="dv" class="form-control" value="{{old('dv', $data->dv ?? '')}}" />
    </div>
</div>
<div class="form-group">
    <label for="direccion" class="col-lg-3 control-label requerido">Direccion</label>
    <div class="col-lg-8">
        <input type="text" name="direccion" id="direccion" class="form-control" value="{{old('direccion', $data->direccion ?? '')}}" />
    </div>
</div>
<div class="form-group">
    <label for="ciudad_id" class="col-lg-3 control-label requerido">Ciudad</label>
    <div class="col-lg-8">
        <select name="ciudad_id" id="ciudad_id" class="form-control" unique required>
            @foreach($ciudades as $id => $nombre)
                <option value="{{$id}}" {{old("ciudad_id", $data->$id ?? "") == $id ? "selected" : ""}}>{{$nombre}}</option>
            @endforeach
        </select>
    </div>
</div>
