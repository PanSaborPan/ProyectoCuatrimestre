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

        var url = '{{ route("cliente.edit", ":id") }}';
        url = url.replace(':id', b.value);
        $("#div").load(url);

    };
</script>

<script>
    function clickdelete(b) {

        var url = '{{ route("cliente.delete", ":id") }}';
        url = url.replace(':id', b.value);
        $("#div").load(url);
    };
</script>

<script>
    function showform() {

        var url = '{{ route("cliente.forms") }}';
        $("#div").load(url);
    };
</script>


<script type="text/javascript">
    $('#from1').on('submit', function(e) {
        e.preventDefault();

        let Nombre_de_contacto = $('#Nombre_de_contacto').val();
        let Nombre_de_empresa = $('#Nombre_de_empresa').val();
        let Razonsocial = $('#Razonsocial').val();
        let Rfc = $('#Rfc').val();
        let Telefono = $('#Telefono').val();
        let Movil = $('#Movil').val();
        let Correo_electronico_1 = $('#Correo_electronico_1').val();
        let Correo_electronico_2 = $('#Correo_electronico_2').val();
        let Calle = $('#Calle').val();
        let Numero = $('#Numero').val();
        let Codigo_Postal = $('#Codigo_Postal').val();
        let Ciudad = $('#Ciudad').val();
        let Estado = $('#Estado').val();
        let Pais = $('#Pais').val();

        $.ajax({
            url: "{{ route('cliente.create') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                Nombre_de_contacto: Nombre_de_contacto,
                Nombre_de_empresa: Nombre_de_empresa,
                Razonsocial: Razonsocial,
                Rfc: Rfc,
                Telefono: Telefono,
                Movil: Movil,
                Correo_electronico_1: Correo_electronico_1,
                Correo_electronico_2: Correo_electronico_2,
                Calle: Calle,
                Numero: Numero,
                Codigo_Postal: Codigo_Postal,
                Ciudad: Ciudad,
                Estado: Estado,
                Pais: Pais,
            },
            success: function(response) {
                console.log(response);
                alert('Cliente se inserto correctamente');
                $("#div").load("{{ url('/Clientes') }}");
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


        {{-- Boton para mandar a formulario de Clientes --}}
        <div class="panel panel-inverse" data-sortable-id="table-basic-7">
            <div class="panel-heading">
                <h3 class="panel-title">Tabla de Clientes actuales</h3>


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
                                <th width="1%">Empresa</th>
                                <th width="1%">Razon social</th>
                                <th width="1%">RFC</th>
                                <th width="1%">Telefono</th>
                                <th width="1%">Movil</th>
                                <th width="1%">Correo electronico 1</th>
                                <th width="1%">Correo electronico 2</th>
                                <th width="1%">Calle</th>
                                <th width="1%">Numero</th>
                                <th width="1%">Codigo postal</th>
                                <th width="1%">Ciudad</th>
                                <th width="1%">Estado</th>
                                <th width="1%">Pais</th>
                                <th width="1%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach($clientes as $item)
                            <tr class="fradeX odd">

                                <td style="display: none;">{{$item->Id_cliente}}</td>
                                <td style="display: none;">{{$item->Nombre_de_contacto}}</td>
                                <td style="display: none;">{{$item->Nombre_de_empresa}}</td>
                                <td style="display: none;">{{$item->Razonsocial}}</td>
                                <td style="display: none;">{{$item->Rfc}}</td>
                                <td style="display: none;">{{$item->Telefono}}</td>
                                <td style="display: none;">{{$item->Movil}}</td>
                                <td style="display: none;">{{$item->Correo_electronico_1}}</td>
                                <td style="display: none;">{{$item->Correo_electronico_2}}</td>
                                <td style="display: none;">{{$item->Calle}}</td>
                                <td style="display: none;">{{$item->Numero}}</td>
                                <td style="display: none;">{{$item->Codigo_Postal}}</td>
                                <td style="display: none;">{{$item->Ciudad}}</td>
                                <td style="display: none;">{{$item->Estado}}</td>
                                <td style="display: none;">{{$item->Pais}}</td>
                                <td style="display: none;">



                                    <button class="id" id='Modificar' onclick="clickaction(this)" value="{{$item->Id_cliente}}"><i class="fas fa-pen"></i></button>
                                    <button class="id" id='Modificar' onclick="clickdelete(this)" value="{{$item->Id_cliente}}"><i class="fa fa-trash" aria-hidden="true"></i></button>

                                </td>

                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>

        <footer>
            <div id="footer" class="app-footer m-0">
                &copy; 2021 TNS Custom Bussiness All Right Reserved
            </div>
        </footer>

        @else
        <script>
            window.location = "{{ route('home') }}";
            alert('no has iniciado session');
        </script>
        @endif
</body>