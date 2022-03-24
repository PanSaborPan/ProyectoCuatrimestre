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

        var url = '{{ route("users.edit", ":id") }}';
        url = url.replace(':id', b.value);
        $("#div").load(url);

    };
</script>

<script>
    function clickdelete(b) {

        var url = '{{ route("users.delete", ":id") }}';
        url = url.replace(':id', b.value);
        $("#div").load(url);
    };
</script>


<script type="text/javascript">
    $('#from1').on('submit', function(e) {
        e.preventDefault();

        let Nombre = $('#nombre').val();
        let Area = $('#area').val();
        let Usuario = $('#usuario').val();
        let Contraseña = $('#password').val();


        $.ajax({
            url: "{{ route('users.create') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                Nombre: Nombre,
                Area: Area,
                Usuario: Usuario,
                Contraseña: Contraseña,
            },
            success: function(response) {
                console.log(response);
                alert('Usuarios se inserto correctamente');
                $("#div").load("{{ url('/Usuarios') }}");
            },
            error: function(response) {

            },
        });
    });
</script>

{{-- Boton de Volver a la vista de usuarios --}}
<script>
    function volver() {

        $("#div").load("{{ url('/Usuarios') }}");

    }
</script>


@show

<body>

<div id="div">
    <div class="panel panel-inverse" data-sortable-id="form-stuff-3">
            <div class="panel-heading">
                <h5 class="panel-title">Crear Usuario</h5>

                

                

            </div>
            <div class="panel-body">
                <div class="table-responsive">
                
                <form id="from1">

            @csrf
            
          
            
            
            <div class="row mb-3">
            
            <div class="col-md-5">
            <div class="mb-7px">
                <br>

            <label class="form-label">Nombre</label>
            <input class="form-control" id="nombre" type="text" placeholder="Nombre" required />
            <label class="form-label">Area</label>
            <input class="form-control" id="area" type="text" placeholder="Area" required />
            <label class="form-label">Usuario</label>
            <input type="text" id="usuario" class="form-control mb-5px" placeholder="Usuario" required />
            <label class="form-label">Contraseña</label>
            <input type="password" id="password" class="form-control" placeholder="Contraseña" required />

            </div>
            </div>
</div>
            <br>
            <button id="subir" type="submit" class="btn btn-primary">Crear nuevo cliente</button>
            <button onclick="volver()" id="volvercli" class="btn btn-danger">volver</button>

        </form>

        </div>
            </div>

        <br>
        <br>



        <footer>
            <div id="footer" class="app-footer m-0">
                &copy; 2021 TNS Custom Bussiness All Right Reserved
            </div>
        </footer>


</div>
    </div>


</body>