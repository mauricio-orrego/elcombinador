@foreach ($datassal as $datasal)
<script>window.location.replace("{{route('validarx_salida', ['id' => $datasal->id])}}"); </script>
@endforeach
