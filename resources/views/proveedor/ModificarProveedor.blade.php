<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>@section('title') @show</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @section('style')

    <link href="{{ asset('css/vendor.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/default/app.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <link href="{{ asset('plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('plugins/jquery-ui-dist/jquery-ui.min.css')}}" />






    @show

    @section('script')
    <script src="{{ asset('js/vendor.min.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{ asset('js/theme/default.min.js') }}"></script>
    <script src="{{ asset('js/demo/render.highlight.js')}}"></script>
    <script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('plugins/jquery.maskedinput/src/jquery.maskedinput.js') }}"></script>


    <script>
        $("#telefono").mask("(99)-9999-9999");
    </script>

    <script>
        function volver() {

            $("#div").load("{{ url('/Proveedor') }}");

        }
    </script>




    <script type="text/javascript">
        $('#from1').on('submit', function(e) {
            e.preventDefault();

            let id = $('#id').val();
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

            var url = '{{ route("proveedor.update", ":id") }}';
            url = url.replace(':id', id.value);


            $.ajax({
                url: url,
                type: "PUT",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
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
                    alert('Proovedor se modifico correctamente');
                    $("#div").load("{{ url('/Proveedor') }}");
                },
                error: function(response) {

                },
            });
        });
    </script>



    @show
</head>

<body>
    @if(Session::has('users.Usuario'))
    <div id="div">
    <div class="panel panel-inverse" data-sortable-id="form-stuff-3">
            <div class="panel-heading">
                <h5 class="panel-title">Modificar Proveedor</h5>

                

                

            </div>
            <div class="panel-body">
                <div class="table-responsive">

            <form data-parsley-validate="true" id="from1">
            <div class="row mb-3">
            
            <div class="col-md-5">
            <div class="mb-7px">
            <br>
            <label aling="center" class="form-label">CONTACTO:</label><br>
            <br>

                @foreach($proveedor as $item)
                <input type="hidden" value="{{$item->Id_proveedor}}" id="id" />
                <label class="form-label">Nombre</label>
                <input class="form-control" id="nombre" type="text" placeholder="Nombre" value="{{$item->Nombre}}" />
                <label class="form-label">Compañia</label>
                <input class="form-control" id="compañia" type="text" placeholder="Compañia" value="{{$item->Compañia}}" />
                <label class="form-label">Correo</label>
                <input type="text" id="correo" class="form-control mb-5px" placeholder="Correo" value="{{$item->Correo}}" />
                <label class="form-label">Telefono</label>
                <input type="text" id="telefono" class="form-control" placeholder="Telefono" value="{{$item->Telefono}}" />
                <label class="form-label">Celular</label>
                <input type="text" id="celular" class="form-control" placeholder="Celular" value="{{$item->Celular}}" />
                </div>
</div>
<div class="col-md-5">          
<div class="mb-7px">            
            <br>
            <label aling="center" class="form-label">DIRECCION:</label><br>
            <br>
                <label class="form-label">Calle</label>
                <input type="text" id="calle" class="form-control" placeholder="Calle" value="{{$item->Calle}}" />
                <label class="form-label">Numero</label>
                <input type="text" id="numero" class="form-control" placeholder="Numero" value="{{$item->Numero}}" />
                <label class="form-label">Ciudad</label>
                <input type="text" id="ciudad" class="form-control" placeholder="Ciudad" value="{{$item->Ciudad}}" />
                <label class="form-label">Estado</label>
                <input type="text" id="estado" class="form-control" placeholder="Estado" value="{{$item->Estado}}" />
                <label class="form-label">Pais</label>
                <input type="text" id="pais" class="form-control" placeholder="Pais" value="{{$item->Pais}}" />
                <label class="form-label">Codigo postal</label>
                <input type="text" id="codigo_postal" class="form-control" placeholder="Codigo Postal" value="{{$item->Codigo_postal}}" />
                </div>
            </div>
</div>
            <br>
                <button type="submit" class="btn btn-primary">Modificar el proveedor</button>
                @endforeach
            </form>
            <button onclick="volver()" id="volver" class="btn btn-danger">volver</button>
            </div>
            </div>

        <br>
        <br>



        </div>
        <footer>
            <div id="footer" class="app-footer m-0">
                &copy; 2021 TNS Custom Bussiness All Right Reserved
            </div>
        </footer>

    </div>

    @else
    <script>
        window.location = "{{ route('home') }}";
        alert('no has iniciado session');
    </script>
    @endif
</body>