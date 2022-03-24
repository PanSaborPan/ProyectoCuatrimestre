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






{{-- Boton para mandar a formulario de Productos --}}
<div class="pos-stock-body">
    <div class="form-group">
        @if(count(Cart::getContent()))
        <div class="note note-primary note-with-end-icon">
            <div class="note-icon"><i class="fas fa-shopping-cart"></i></div>

            <div class="note-content">

                <h4><b>Carrito de compras con nuevos objetos <span class="badge bg-danger"> {{count(Cart::getContent())}}</span></b></h4>
                <p><b>Hay objetos en el carrito</b></p>
                <a href='{{route("carro")}}' class="btn btn-dark">Ver carrito</a>
            </div>
        </div>
        @else
        <div class="note note-secondary note-with-end-icon">
            <div class="note-icon"><i class="fas fa-shopping-cart"></i></div>
            <div class="note-content">
                <h4><b class="text-white">Carrito de compras con nuevos objetos</b></h4>
                <b class="text-white">Hay objetos en el carrito</b>
            </div>
        </div>

        @endif
    </div>
    <div class="pos-stock-content">
        <div class="pos stock-content-container">
            <div class="row gx-4">


                @foreach($productos as $item)

                <div class="col-3  p-4 mt-4 text-center">
                    <form id="Añadir" action="{{route('cart.add')}}" method="post">
                        @csrf
                        <input name="id" class="form-control" value="{{$item->id}}" hidden>
                        <div class="pos-stock-product">
                            <div class="pos-stock-product-container">
                                <div class="product">
                                    <div class="product-img">
                                        <div class="img" style="background-image: url(../assets/img/pos/product-1.jpg)"></div>
                                    </div>
                                    <div class="product-info">
                                        <div class="title">{{$item->Nombre_del_producto}}</div>


                                        <div class="product-option">
                                            <div class="option">
                                                <div class="option-label">Stock:</div>
                                                <div class="option-input">
                                                    <input type="text" class="form-control" value="{{$item->Existencias_actuales}}" readonly>
                                                </div>
                                            </div>
                                            <div class="option">
                                                <div class="option-label">Precio unitario</div>
                                                <div class="option-input">
                                                    <input type="text" class="form-control" value="{{$item->Precio_unitario}} $" readonly>
                                                </div>
                                            </div>
                                            <div class="option">
                                                <div class="option-label">Cantidad</div>
                                                <div class="option-input">
                                                    <input name="Cantidad" type="text" class="form-control" value="" oninput="mostrar('{{$item->id}}','{{$item->Precio_unitario}}',this.value)">
                                                </div>
                                            </div>
                                            <div class="option">
                                                <div class="option-label">Total</div>
                                                <div class="option-input">
                                                    <input id="{{$item->id}}" type="text" value="" readonly> $
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-action">
                                        <br>
                                        <input type="submit" name="btn" class="btn btn-success " value="Añadir al carrito">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @endforeach

            </div>

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