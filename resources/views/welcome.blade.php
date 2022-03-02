@extends('base')

@section('style')
@parent
<link href="{{asset ('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css')}}" rel="stylesheet" />
@endsection

@section('title', 'Welcome')

@section('container')

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



                <button class="id" id='Modificar' onclick="clickaction(this)" value="{{$item->Id_usuario}}">Modificar</button>
                <button class="id" id='Modificar' onclick="clickdelete(this)" value="{{$item->Id_usuario}}">Borrar</button>

            </td>

        </tr>
        @endforeach
</table>

@endsection