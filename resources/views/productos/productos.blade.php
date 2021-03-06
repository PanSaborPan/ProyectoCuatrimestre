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
        colReorder: true,
        dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
        buttons: [{
            extend: 'excel',
            title: 'productos bajos de stock',
            className: 'btn-sm',
            exportOptions: {
                columns: [0, 1, 2, 5, 6, 7, 8, 9],
                rows: function(idx, data, node) {
                    if (data[7] <= 100) {
                        return data;
                    }
                }
            }
        },
        {
            extend: 'pdf',
            title: 'productos bajos de stock',
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

<script>
    function showformP() {

        var url = '{{ route("producto.forms") }}';
        $("#div").load(url);
    };
</script>

<script type="text/javascript">
    $('#from1').on('submit', function(e) {
        e.preventDefault();

        let id = $('#id').val();
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
                id: id,
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
        {{-- Boton para mandar a formulario de Productos --}}
        <div class="panel panel-inverse" data-sortable-id="table-basic-7">
            <div class="panel-heading">
                <h3 class="panel-title">Tabla de productos actuales</h3>


                <div class="panel-heading-btn">

                    <a onclick="showformP()" class="btn btn-primary btn-icon btn-circle btn-lg">+</a>
                    
                </div>

            </div>
           
            <div class="panel-body">
                <div class="table-responsive">
                <div class="mb-3px">
			<span class="badge bg-red">Producto sin existencia</span>							
			<span class="badge bg-yellow text-black">Producto bajo en existencia</span>
			</div>
                    <table id="data-table-default" class="table table-bordered align-middle">
                    
                        <thead>
                            <tr>
                                <th width="1%">id</th>
                                <th width="1%">Nombre del producto</th>
                                <th width="1%">Descripcion del producto</th>
                                <th width="1%">Clave del sat</th>
                                <th width="1%">Clave de unidad</th>
                                <th width="1%">Tipo</th>
                                <th width="1%">Precio unitario</th>
                                <th width="1%">Existencias actuales</th>
                                <th width="1%">Punto de reabastecimiento</th>
                                <th width="1%">Cuenta de activo de inventario</th>
                                <th width="1%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach($productos as $item)
                            @if($item->Existencias_actuales === 0 ) 
                                </tr>
                                <tr class="fradeX odd">
                                <td style="display: none; background-color:red">{{$item->id}}</td>
                                <td style="display: none; background-color:red">{{$item->Nombre_del_producto}}</td>
                                <td style="display: none; background-color:red">{{$item->Descripcion_del_producto}}</td>
                                <td style="display: none; background-color:red">{{$item->Clave_del_sat}}</td>
                                <td style="display: none; background-color:red">{{$item->Clave_de_unidad}}</td>
                                <td style="display: none; background-color:red">{{$item->Tipo}}</td>
                                <td style="display: none; background-color:red">{{$item->Precio_unitario}}</td>
                                <td id='cantidad' style="display: none; background-color:red">{{$item->Existencias_actuales}}</td>
                                <td style="display: none; background-color:red">{{$item->Punto_de_reabastecimiento}}</td>
                                <td style="display: none; background-color:red">{{$item->Cuenta_de_activo_de_inventario}}</td>

                                <td style="display: none; background-color:red">
                                <button class="id" id='Modificar' onclick="clickaction(this)" value="{{$item->id}}"><i class="fas fa-pen"></i></button>
                                    <button class="id" id='Modificar' onclick="clickdelete(this,'{{$item->Existencias_actuales}}')" value="{{$item->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </td>
                                            
                                </tr>
                             
                                @elseif($item->Existencias_actuales <= 100)
                                <tr class="fradeX odd">

                                <td style="display: none; background-color:yellow">{{$item->id}}</td>

                                <td style="display: none; background-color:yellow">{{$item->Nombre_del_producto}}</td>
                                <td style="display: none; background-color:yellow">{{$item->Descripcion_del_producto}}</td>
                                <td style="display: none; background-color:yellow">{{$item->Clave_del_sat}}</td>
                                <td style="display: none; background-color:yellow">{{$item->Clave_de_unidad}}</td>
                                <td style="display: none; background-color:yellow">{{$item->Tipo}}</td>
                                <td style="display: none; background-color:yellow">{{$item->Precio_unitario}}</td>
                                <td id='cantidad' style="display: none; background-color:yellow">{{$item->Existencias_actuales}}</td>
                                <td style="display: none; background-color:yellow">{{$item->Punto_de_reabastecimiento}}</td>
                                <td style="display: none; background-color:yellow">{{$item->Cuenta_de_activo_de_inventario}}</td>
                                <td style="display: none; background-color:yellow">


                                    <button class="id" id='Modificar' onclick="clickaction(this)" value="{{$item->id}}"><i class="fas fa-pen"></i></button>
                                    <button class="id" id='Modificar' onclick="clickdelete(this,'{{$item->Existencias_actuales}}')" value="{{$item->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>


                                </td>

                                @else<tr class="fradeX odd">

<td style="display: none;">{{$item->id}}</td>

<td style="display: none;">{{$item->Nombre_del_producto}}</td>
<td style="display: none;">{{$item->Descripcion_del_producto}}</td>
<td style="display: none;">{{$item->Clave_del_sat}}</td>
<td style="display: none;">{{$item->Clave_de_unidad}}</td>
<td style="display: none;">{{$item->Tipo}}</td>
<td style="display: none;">{{$item->Precio_unitario}}</td>
<td id='cantidad' style="display: none;">{{$item->Existencias_actuales}}</td>
<td style="display: none;">{{$item->Punto_de_reabastecimiento}}</td>
<td style="display: none;">{{$item->Cuenta_de_activo_de_inventario}}</td>
<td style="display: none;">





    <button class="id" id='Modificar' onclick="clickaction(this)" value="{{$item->id}}"><i class="fas fa-pen"></i></button>
    <button class="id" id='Modificar' onclick="clickdelete(this,'{{$item->Existencias_actuales}}')" value="{{$item->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>


</td>

</tr>

                            @endif
                           
                                 
                            
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
    </div>

    @else
    <script>
        window.location = "{{ route('home') }}";
        alert('no has iniciado session');
    </script>
    @endif
</body>