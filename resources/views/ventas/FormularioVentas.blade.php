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

        var url = '{{ route("ventas.edit", ":id") }}';
        url = url.replace(':id', b.value);
        $("#div").load(url);

    };
</script>

<script>
    function clickdelete(b) {

        var url = '{{ route("ventas.delete", ":id") }}';
        url = url.replace(':id', b.value);
        $("#div").load(url);
    };
</script>

{{-- Boton de Volver a la vista de Ventas --}}
<script>
    function volverventas() {

        $("#div").load("{{ url('/Ventas') }}");

    }
</script>

<script type="text/javascript">
    $('#from1').on('submit', function(e) {
        e.preventDefault();

        let Cliente = $('#cliente').val();
        let Producto = $('#producto').val();
        let Descripcion = $('#descripcion').val();
        let Cantidad = $('#cantidad').val();
        let Precio_Unitario = $('#precio_unitario').val();


        $.ajax({
            url: "{{ route('ventas.create') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",

                Cliente: Cliente,
                Producto: Producto,
                Descripcion: Descripcion,
                Cantidad: Cantidad,
                Precio_Unitario: Precio_Unitario

            },
            success: function(response) {
                console.log(response);
                alert('La venta se inserto correctamente');
                $("#div").load("{{ url('/Ventas') }}");
            },
            error: function(response) {

            },
        });
    });
</script>




@show

<body>

    <div id="div">

        <h1>Captura de ventas</h1>
        <form id="from1">

            @csrf

            <label class="form-label">Cliente</label>
            <input class="form-control" id="cliente" type="text" placeholder="Cliente" required />
            <label class="form-label">Producto</label>
            <input class="form-control" id="producto" type="text" placeholder="Producto" required />
            <label class="form-label">Descripcion</label>
            <textarea id="descripcion" class="form-control mb-5px" placeholder="Descripcion" required></textarea>
            <label class="form-label">Cantidad</label>
            <input type="number" id="cantidad" class="form-control" placeholder="Cantidad" required />
            <label class="form-label">Precio por unidad</label>
            <input type="number" class="form-control" step="0.01" id="precio_unitario" placeholder="Precio_Unitario" required />
            <br>
            <button id="subir" type="submit" class="btn btn-primary">Crear nueva venta</button>

            <button onclick="volverventas()" id="volver" class="btn btn-danger">volver</button>
        </form>


        <br>
        <br>






    </div>

    <footer>
        <div id="footer" class="app-footer m-0">
            &copy; 2021 TNS Custom Bussiness All Right Reserved
        </div>
    </footer>
</body>