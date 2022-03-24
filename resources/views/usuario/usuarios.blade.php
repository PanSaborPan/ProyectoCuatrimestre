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

<script>
    function showform() {
        var url = '{{ route("user.forms") }}';
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




@show

<body>

    <div id="div">

        {{-- Boton para mandar a formulario de Usuarios --}}

        <div class="panel panel-inverse" data-sortable-id="table-basic-7">
            <div class="panel-heading">
                <h3 class="panel-title">Tabla de usuarios actuales</h3>


                <div class="panel-heading-btn">
                    <a onclick="showform()" class="btn btn-primary btn-icon btn-circle btn-lg">+</a>
                </div>

            </div>


            <div class="panel-body">
                <div class="table-responsive">
                    <table id="data-table-default" class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th width="1%">id</th>
                                <th width="1%">Nombre</th>
                                <th width="1%">Area</th>
                                <th width="1%">Usuario</th>
                                <th width="1%">Contraseña</th>
                                <th width="1%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach($usuarios as $item)
                            <tr class="fradeX odd">

                                <td style="display: none;">{{$item->Id_usuario}}</td>
                                <td style="display: none;">{{$item->Nombre}}</td>
                                <td style="display: none;">{{$item->Area}}</td>
                                <td style="display: none;">{{$item->Usuario}}</td>
                                <td style="display: none;">{{$item->Contraseña}}</td>
                                <td style="display: none;">

                                    <button class="id" id='Modificar' onclick="clickaction(this)" value="{{$item->Id_usuario}}"><i class="fas fa-pen"></i></button>
                                    <button class="id" id='Modificar' onclick="clickdelete(this)" value="{{$item->Id_usuario}}"><i class="fa fa-trash" aria-hidden="true"></i></button>


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <footer>
            <div id="footer" class="app-footer m-0">
                &copy; 2021 TNS Custom Bussiness All Right Reserved
            </div>
        </footer>
    </div>



</body>