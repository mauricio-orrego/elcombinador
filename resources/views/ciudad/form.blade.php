<div class="form-group">
    <label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
    <div class="col-lg-8">
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $data->nombre ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="depto_id" class="col-lg-3 control-label requerido">Departamento</label>
    <div class="col-lg-8">
        <select name="depto_id" id="depto_id" class="form-control" unique required>
            @foreach($deptos as $id => $nombre)
                <option value="{{$id}}" {{old("depto_id", $data->$id ?? "") == $id ? "selected" : ""}}>{{$nombre}}</option>
                @endforeach
        </select>
    </div>
</div>