<div class="form-group">
    <label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
    <div class="col-lg-8">
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $data->nombre ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="costo" class="col-lg-3 control-label requerido">Costo</label>
    <div class="col-lg-8">
        <input type="costo" name="costo" id="costo" class="form-control" value="{{old('costo', $data->costo ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="valorventa" class="col-lg-3 control-label requerido">Valor Venta</label>
    <div class="col-lg-8">
        <input type="valorventa" name="valorventa" id="valorventa" class="form-control" value="{{old('valorventa', $data->valorventa ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="bodega_id" class="col-lg-3 control-label requerido">Bodega</label>
    <div class="col-lg-8">
        <select name="bodega_id" id="bodega_id" class="form-control" unique required>
            <option value="">Seleccione bodega</option>
            @foreach($bodegas as $id => $nombre)
                <option value="{{$id}}" {{old("bodega_id", $data->$id ?? "") == $id ? "selected" : ""}}>{{$nombre}}</option>
                @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="categoria_id" class="col-lg-3 control-label requerido">Categoria</label>
    <div class="col-lg-8">
        <select name="categoria_id" id="categoria_id" class="form-control" unique required>
            <option value="">Seleccione categoria</option>
            @foreach($categorias as $id => $nombre)
                <option value="{{$id}}" {{old("categoria_id", $data->$id ?? "") == $id ? "selected" : ""}}>{{$nombre}}</option>
            @endforeach
        </select>
    </div>
</div>
