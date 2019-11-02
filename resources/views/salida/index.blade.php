@foreach ($datasent as $dataent)
<script>window.location.replace("{{route('validarx_entrada', ['id' => $dataent->id])}}"); </script>
@endforeach
