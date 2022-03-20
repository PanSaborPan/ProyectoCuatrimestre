<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>@section('title') @show</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @section('style')
    <link href="{{ asset('css/vendor.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/default/app.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('plugins/jquery-ui-dist/jquery-ui.min.css')}}" />


    @show
</head>
@section('script')
<script src="{{ asset('js/vendor.min.js') }}"></script>
<script src="{{ asset('js/app.min.js') }}"></script>
<script src="{{ asset('js/theme/default.min.js') }}"></script>
<script src="{{ asset('js/demo/render.highlight.js')}}"></script>
<script src="{{ asset('plugins/@highlightjs/cdn-assets/highlight.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/jquery.maskedinput/src/jquery.maskedinput.js') }}"></script>



<script type="text/javascript">
    $('#data-table-default').DataTable({
        responsive: true
    });
</script>

<script>
    function clickaction(b) {

        var url = '{{ route("proveedor.edit", ":id") }}';
        url = url.replace(':id', b.value);
        $("#div").load(url);

    };
</script>

<script>
    function clickdelete(b) {

        var url = '{{ route("proveedor.delete", ":id") }}';
        url = url.replace(':id', b.value);
        $("#div").load(url);
    };
</script>

{{-- Boton de Volver a la vista de Proveedor --}}
<script>
    function volverproveedor() {

        $("#div").load("{{ url('/Proveedor') }}");

    }
</script>

<script type="text/javascript">
    $('#from1').on('submit', function(e) {
        e.preventDefault();

        let Nombre = $('#nombre').val();
        let Compañia = $('#compañia').val();
        let Correo = $('#correo').val();
        let Telefono = $('#telefono').val();
        let Celular = $('#celular').val();
        let Calle = $('#calle').val();
        let Numero = $('#numero').val();
        let Ciudad = $('#ciudad').val();
        let Estado = $('#estado').val();
        let Pais = $('#pais').val();
        let Codigo_postal = $('#codigo_postal').val();

        $.ajax({
            url: "{{ route('proveedor.create') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                Nombre: Nombre,
                Compañia: Compañia,
                Correo: Correo,
                Telefono: Telefono,
                Celular: Celular,
                Calle: Calle,
                Numero: Numero,
                Ciudad: Ciudad,
                Estado: Estado,
                Pais: Pais,
                Codigo_postal: Codigo_postal,
            },
            success: function(response) {
                console.log(response);
                alert('Proveedor se inserto correctamente');
                $("#div").load("{{ url('/Proveedor') }}");
            },
            error: function(response) {

            },
        });
    });
</script>




@show

<body>

    @if(Session::has('users.Usuario'))
    <div id="div">

        <h1>Captura de Proveedores</h1>
        <form id="from1">

            @csrf

            <label class="form-label">Nombre</label>
            <input class="form-control" id="nombre" type="text" placeholder="Nombre" required />
            <label class="form-label">Compañia</label>
            <input class="form-control" id="compañia" type="text" placeholder="Compañia" required />
            <label class="form-label">Correo</label>
            <input type="text" id="correo" class="form-control mb-5px" placeholder="Correo" required />
            <label class="form-label">Telefono</label>
            <input type="text" id="telefono" class="form-control" placeholder="Telefono" required />
            <label class="form-label">Celular</label>
            <input type="text" id="celular" class="form-control" placeholder="Celular" required />
            <br>
            <label aling="center" class="form-label">DIRECCION:</label><br>
            <br>

            <label class="form-label">Calle</label>
            <input type="text" id="calle" class="form-control" placeholder="Calle" required />
            <label class="form-label">Numero</label>
            <input type="text" id="numero" class="form-control" placeholder="Numero" required />
            <label class="form-label">Ciudad</label>
            <input type="text" id="ciudad" class="form-control" placeholder="Ciudad" required />
            <label class="form-label">Estado</label>
            <input type="text" id="estado" class="form-control" placeholder="Estado" required />
            <label class="form-label">Pais</label>
            <input type="text" id="pais" class="form-control" placeholder="Pais" required />
            <label class="form-label">Codigo postal</label>
            <input type="text" id="codigo_postal" class="form-control" placeholder="Codigo Postal" required />

            <br>
            <button id="subir" type="submit" class="btn btn-primary">Crear nuevo proveedor</button>

            <button onclick="volverproveedor()" id="volver" class="btn btn-danger">volver</button>
        </form>


        <br>
        <br>





    </div>
    @else
    <script>
        window.location = "{{ route('home') }}";
        alert('no has iniciado session');
    </script>
    @endif
</body>