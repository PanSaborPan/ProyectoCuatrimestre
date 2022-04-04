@extends('base')

@section('title', 'Welcome')


@section('style')
@parent
<link href="{{ asset('plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ asset('plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ asset('plugins/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('plugins/jquery-ui-dist/jquery-ui.min.css')}}" />
<link href="{{ asset('plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" />


@endsection


@section('container')
@if(Session::has('users.Usuario'))

<div class="panel panel-inverse" data-sortable-id="table-basic-7">
    <div class="panel-heading">
        <h3 class="panel-title">Productos en el carrito</h3>



    </div>
    <div id="panel" class="panel-body">
        <form id="borrar" action="{{route('descarga_pdf')}}" method="POST">
            @csrf
            <div class="row mb-2">

                <div class="col-md-3">
                    <div class="mb-4px">
                        <label>Cliente</label>
                        <select class="form-select" name="ClientesList">

                            @foreach($clientes as $info)
                            <option name="ClientesList" value="{{$info->Id_cliente}}">{{$info->Nombre_de_contacto}}</option>
                            @endforeach
                        </select>


                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="data-table-default2" class="table  table-bordered table-hover align-middle">
                    <thead>
                        <tr>

                            <th width="1%" data-orderable="false">id</th>
                            <th width="1%" data-orderable="false">Nombre</th>
                            <th width="1%" data-orderable="false">Precio c/u</th>
                            <th width="1%" data-orderable="false">Cantidad</th>
                            <th width="1%" data-orderable="false">Total</th>
                            <th width="1%" data-orderable="false">Acciones</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach(Cart::getContent() as $var)
                        <tr>

                            <td>{{$var->id}}</td>
                            <td>{{$var->name}}</td>
                            <td>{{$var->price}}</td>
                            <td>{{$var->quantity}}</td>
                            <?php
                            $algo = $var->quantity * $var->price;

                            echo "<td>" . $algo . "</td>";
                            ?>
                            <td>
                                <form id="borrar" action="{{route('cart.removeitem')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$var->id}}">
                                    <button type="submit">Borrar</button>
                                </form>



                            </td>
                        </tr>

                        @endforeach


                    </tbody>

                </table>
                <div style="position:relative; right: -84%;" class="panel-body">
                    Subtotal:
                    <input id="Subtotal" name="Subtotal" value="{{Cart::getSubTotal()}}" readonly>

                </div>
                <div style="position:relative; right: -86%;" class="panel-body">
                    Iva:
                    <?php
                    $algo = Cart::getSubTotal() * 0.16;
                    echo "<input id='Iva' type='Text' name='Iva' value=" . $algo . " readonly>";
                    ?>

                </div>
                <div style="position:relative; right: -85.5%;" class="panel-body">
                    Total
                    <?php
                    $Iva = Cart::getSubTotal() * 0.16;
                    $Total = Cart::getSubTotal() + $Iva;
                    echo "<input id='Total' type='Text' name='Total' value=" . $Total . " readonly>";
                    ?>
                </div>







            </div>
            <br>
            <a href='{{route("show")}}' class="btn btn-primary">Volver</a>
            <br>
            <br>

            <button type="submit" class="btn btn-danger">PDF</button>
        </form>
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
@endsection

@section('script')
@parent
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





<script>
    function Iva(z) {
        document.getElementsByClassName('ClientesList').value = z * 0.16;

    }
</script>






<script>
    function mostrar(z, x, y) {
        document.getElementById(z).value = x * y;

    }
</script>


<script>
    $(document).ready(function() {
        var table = $('#data-table-default2').DataTable({
            responsive: true,
        });
    });
</script>




<!--<script type="text/javascript">
    $('#Añadir').on('submit', function(e) {
        e.preventDefault();
        let id = $('#Id').val();
        let Cantidad = $('#Cantidad').val();




        $.ajax({
            url: "{{ route('cart.add') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: id,
                Cantidad: Cantidad,


            },
            success: function(response) {
                console.log(response);
                $("#div").load("{{ url('/cart-show') }}");
            },
            error: function(response) {

            },
        });
    });
</script>-->




@endsection