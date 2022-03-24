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
    <link href="{{ asset('plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" />


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
<script src="{{ asset('plugins/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/jszip/dist/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/jquery.maskedinput/src/jquery.maskedinput.js') }}"></script>



<script type="text/javascript">
    $('#data-table-default').DataTable({
        responsive: true,
        dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
        buttons: [{
            extend: 'excel',
            title: 'productos escasos',
            className: 'btn-sm',
            exportOptions: {
                columns: [0, 1, 2, 5, 6, 7, 8, 9],
                rows: function(idx, data, node) {
                    if (data[7] <= 100) {
                        return data;
                    }
                }
            }
        }],
    });
</script>

<script>
    function clickaction(b) {

        var url = '{{ route("producto.edit", ":id") }}';
        url = url.replace(':id', b.value);
        $("#div").load(url);

    };
</script>


<script>
    function clickdelete(b, a) {
        if (a <= 0) {
            var url = '{{ route("producto.delete", ":id") }}';
            url = url.replace(':id', b.value);
            alert('producto eliminado correctamente');
            $("#div").load(url);
        } else {
            alert('no se puede eliminar si aun hay existencias del producto');
        }

    };
</script>

{{-- Boton de Volver a la vista de Productos --}}
<script>
    function volverproductos() {

        $("#div").load("{{ url('/Productos') }}");

    }
</script>


<script type="text/javascript">
    $('#from1').on('submit', function(e) {
        e.preventDefault();

        let Nombre_del_producto = $('#Nombre_del_producto').val();
        let Descripcion_del_producto = $('#Descripcion_del_producto').val();
        let Clave_del_sat = $('#Clave_del_sat').val();
        let Clave_de_unidad = $('#Clave_de_unidad').val();
        let Tipo = $('#Tipo').val();
        let Precio_unitario = $('#Precio_unitario').val();
        let Existencias_actuales = $('#Existencias_actuales').val();
        let Punto_de_reabastecimiento = $('#Punto_de_reabastecimiento').val();
        let Cuenta_de_activo_de_inventario = $('#Cuenta_de_activo_de_inventario').val();

        $.ajax({
            url: "{{ route('producto.create') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                Nombre_del_producto: Nombre_del_producto,
                Descripcion_del_producto: Descripcion_del_producto,
                Clave_del_sat: Clave_del_sat,
                Clave_de_unidad: Clave_de_unidad,
                Tipo: Tipo,
                Precio_unitario: Precio_unitario,
                Existencias_actuales: Existencias_actuales,
                Punto_de_reabastecimiento: Punto_de_reabastecimiento,
                Cuenta_de_activo_de_inventario: Cuenta_de_activo_de_inventario,

            },
            success: function(response) {
                console.log(response);
                alert('Producto se inserto correctamente');
                $("#div").load("{{ url('/Productos') }}");
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
    <div class="panel panel-inverse" data-sortable-id="form-stuff-3">
            <div class="panel-heading">
                <h5 class="panel-title">Crear Producto</h5>

                

                

            </div>
            <div class="panel-body">
                <div class="table-responsive">
                
                <form id="from1">
            @csrf
            <div class="row mb-3">
            
            <div class="col-md-5">
            <div class="mb-7px">
            
            <br>

            <label class="form-label">Nombre del producto</label>
            <input class="form-control" id="Nombre_del_producto" type="text" placeholder="Nombre del producto" required />
            <label class="form-label">Descriptcion del producto</label>
            <textarea class="form-control" id="Descripcion_del_producto" placeholder="Descrpcion del producto" required></textarea>
            <label class="form-label">Clave del sat</label>
            <input type="number" id="Clave_del_sat" class="form-control mb-5px" placeholder="Clave SAT" required />
            <label class="form-label">Clave de unidad</label>
            <input type="text" id="Clave_de_unidad" class="form-control" placeholder="Clave de unidad" required />
            <label class="form-label">Tipo</label>
            <input type="text" id="Tipo" class="form-control" placeholder="Tipo" required />
            <label class="form-label">Precio unitario</label>
            <input type="number" id="Precio_unitario" class="form-control" placeholder="Precio por unidad" required />
            <label class="form-label">Existencias actuales</label>
            <input type="number" id="Existencias_actuales" class="form-control" placeholder="Existencias" required />
            <label class="form-label">Puntos de reabastecimiento</label>
            <input type="number" id="Punto_de_reabastecimiento" class="form-control" placeholder="Puntos de reabastecimiento" required />
            <label class="form-label">Cuenta de activo de inventario</label>
            <input type="number" id="Cuenta_de_activo_de_inventario" class="form-control" placeholder="Cuenta de activo de inventario" required />
            </div>
            </div>
</div>
            <br>
            <button id="subir" type="submit" class="btn btn-primary">Crear nuevo Producto</button>
            <button onclick="volverproductos()" id="volver" class="btn btn-danger">volver</button>

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

    @else
    <script>
        window.location = "{{ route('home') }}";
        alert('no has iniciado session');
    </script>
    @endif


</body>