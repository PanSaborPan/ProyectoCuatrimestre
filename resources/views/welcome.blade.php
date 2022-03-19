@extends('base')

@section('style')
@parent
<link href="{{asset ('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css')}}" rel="stylesheet" />
<link href="{{asset('plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{asset('plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />



@endsection





@section('title', 'Welcome')

@section('container')
<html>
<!-- BEGIN row -->
<div class="contenido">
    <!-- BEGIN col-8 -->
    <div class="col-xl-13 ">
        <!-- BEGIN panel -->
        <div class="panel panel-inverse" data-sortable-id="index-1">
            <div class="panel-heading">
                <h4 class="panel-title">tabla de productos</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="panel-body pe-1">
                <div class="table-responsive">
                    <table id="data-table-default5" class="table table-bordered align-middle">
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

                            </tr>
                        </thead>
                        <tbody>


                            @foreach($productos as $item)
                            @if($item->Existencias_actuales
                            <= 100) <tr class="fradeX odd">
                                <td style="display: none; background-color:yellow">{{$item->SKU}}</td>
                                <td style="display: none; background-color:yellow">{{$item->Nombre_del_producto}}</td>
                                <td style="display: none; background-color:yellow">{{$item->Descripcion_del_producto}}</td>
                                <td style="display: none; background-color:yellow">{{$item->Clave_del_sat}}</td>
                                <td style="display: none; background-color:yellow">{{$item->Clave_de_unidad}}</td>
                                <td style="display: none; background-color:yellow">{{$item->Tipo}}</td>
                                <td style="display: none; background-color:yellow">{{$item->Precio_unitario}}</td>
                                <td id='cantidad' style="display: none; background-color:yellow">{{$item->Existencias_actuales}}</td>
                                <td style="display: none; background-color:yellow">{{$item->Punto_de_reabastecimiento}}</td>
                                <td style="display: none; background-color:yellow">{{$item->Cuenta_de_activo_de_inventario}}</td>


                                </tr>
                                @else
                                <tr class="fradeX odd">
                                    <td style="display: none;">{{$item->SKU}}</td>
                                    <td style="display: none;">{{$item->Nombre_del_producto}}</td>
                                    <td style="display: none;">{{$item->Descripcion_del_producto}}</td>
                                    <td style="display: none;">{{$item->Clave_del_sat}}</td>
                                    <td style="display: none;">{{$item->Clave_de_unidad}}</td>
                                    <td style="display: none;">{{$item->Tipo}}</td>
                                    <td style="display: none;">{{$item->Precio_unitario}}</td>
                                    <td id='cantidad' style="display: none;">{{$item->Existencias_actuales}}</td>
                                    <td style="display: none;">{{$item->Punto_de_reabastecimiento}}</td>
                                    <td style="display: none;">{{$item->Cuenta_de_activo_de_inventario}}</td>


                                </tr>

                                @endif
                                @endforeach
                    </table>
                    <div id="interactive-chart" class="h-10px">


                    </div>
                </div>
            </div>
        </div>
        <!-- END panel -->
        <!-- END pane5 -->

        <!-- BEGIN pane2 -->
        <div class="panel panel-inverse" data-sortable-id="index-2">
            <div class="panel-heading">
                <h4 class="panel-title">tabla de cliente</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="panel-body">

                <div class="table-responsive">
                    <table id="data-table-default2" class="table table-striped table-bordered align-middle">
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



                                    <button class="id" id='Modificar' onclick="clickaction(this)" value="{{$item->Id_cliente}}">Modificar</button>
                                    <button class="id" id='Modificar' onclick="clickdelete(this)" value="{{$item->Id_cliente}}">Borrar</button>

                                </td>

                            </tr>
                            @endforeach
                    </table>
                    <div id="interactive-chart" class="h-10px">
                    </div>
                </div>
            </div>
        </div>
        <!-- END pane2 -->


        <!-- BEGIN pane3 -->
        <div class="panel panel-inverse" data-sortable-id="index-1">
            <div class="panel-heading">
                <h4 class="panel-title">tabla de proveedor</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="data-table-default3" class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th width="1%">id</th>
                                <th width="1%">Nombre</th>
                                <th width="1%">Compañia</th>
                                <th width="1%">Correo</th>
                                <th width="1%">Telefono</th>
                                <th width="1%">Celular</th>
                                <th width="1%">Calle</th>
                                <th width="1%">Numero</th>
                                <th width="1%">Ciudad</th>
                                <th width="1%">Estado</th>
                                <th width="1%">Pais</th>
                                <th width="1%">Codigo postal</th>
                                <th width="1%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach($proveedor as $item)
                            <tr class="fradeX odd">

                                <td style="display: none;">{{$item->Id_proveedor}}</td>
                                <td style="display: none;">{{$item->Nombre}}</td>
                                <td style="display: none;">{{$item->Compañia}}</td>
                                <td style="display: none;">{{$item->Correo}}</td>
                                <td style="display: none;">{{$item->Telefono}}</td>
                                <td style="display: none;">{{$item->Celular}}</td>
                                <td style="display: none;">{{$item->Calle}}</td>
                                <td style="display: none;">{{$item->Numero}}</td>
                                <td style="display: none;">{{$item->Ciudad}}</td>
                                <td style="display: none;">{{$item->Estado}}</td>
                                <td style="display: none;">{{$item->Pais}}</td>
                                <td style="display: none;">{{$item->Codigo_postal}}</td>
                                <td style="display: none;">



                                    <button class="id" id='Modificar' onclick="clickaction(this)" value="{{$item->Id_proveedor}}">Modificar</button>
                                    <button class="id" id='Modificar' onclick="clickdelete(this)" value="{{$item->Id_proveedor}}">Borrar</button>

                                </td>

                            </tr>
                            @endforeach
                    </table>

                    <div id="interactive-chart" class="h-10px">
                    </div>
                </div>
            </div>
        </div>
        <!-- END pane3 -->


        <!-- BEGIN pane4 -->
        <div class="panel panel-inverse" data-sortable-id="index-1">
            <div class="panel-heading">
                <h4 class="panel-title">tabla de ventas</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="panel-body ">
                <div class="table-responsive">
                    <table id="data-table-default4" class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th width="1%" data-orderable="false">Folio</th>
                                <th width="1%" data-orderable="false">Cliente</th>
                                <th width="1%" data-orderable="false">Producto</th>
                                <th width="1%" data-orderable="false">Descripcion</th>
                                <th width="1%" data-orderable="false">Cantidad</th>
                                <th width="1%" data-orderable="false">Precio_Unitario</th>
                                <th width="1%" data-orderable="false">Iva</th>
                                <th width="1%" data-orderable="false">Sub_Total</th>
                                <th width="1%" data-orderable="false">Total</th>

                            </tr>
                        </thead>
                        <tbody>


                            @foreach($ventas as $item)
                            <tr class="fradeX odd">

                                <td style="display: none;">{{$item->Folio}}</td>
                                <td style="display: none;">{{$item->Cliente}}</td>
                                <td style="display: none;">{{$item->Producto}}</td>
                                <td style="display: none;">{{$item->Descripcion}}</td>
                                <td style="display: none;">{{$item->Cantidad}}</td>
                                <td style="display: none;">{{$item->Precio_Unitario}}</td>
                                <td style="display: none;">{{$item->Iva}}</td>
                                <td style="display: none;">{{$item->Sub_Total}}</td>
                                <td style="display: none;">{{$item->Total}}</td>


                            </tr>
                            @endforeach
                    </table>

                    <div id="interactive-chart" class="h-10px">
                    </div>
                </div>
            </div>
        </div>


        <div class="panel panel-inverse" data-sortable-id="index-1">
            <div class="panel-heading">
                <h4 class="panel-title">tabla de Usuarios</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="panel-body ">
                <div class="table-responsive">
                    <table id="data-table-default" class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th width="1%">id</th>
                                <th width="1%">Nombre</th>
                                <th width="1%">Area</th>
                                <th width="1%">Usuario</th>
                                <th width="1%">Contraseña</th>

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


                            </tr>
                            @endforeach
                    </table>

                    <div id="interactive-chart" class="h-10px">
                    </div>
                </div>
            </div>
        </div>

</html>

@endsection

@section('script')
@parent
<script src="{{asset('plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>




<script>
    $(document).ready(function() {
        $('#data-table-default').DataTable({
            responsive: true
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#data-table-default2').DataTable({
            responsive: true
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#data-table-default3').DataTable({
            responsive: true
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#data-table-default4').DataTable({
            responsive: true
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#data-table-default5').DataTable({
            responsive: true
        });
    });
</script>

@endsection