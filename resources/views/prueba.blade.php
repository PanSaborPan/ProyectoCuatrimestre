<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota de venta</title>
</head>



<body>
    <img src="{{ asset('img/login-bg/Informacion.jpg') }}" alt="" />

    <div class="row mb-3">

        <div class="col-md-5">
            <div class="mb-7px">
                @foreach($clientes as $var)
                <h4>Datos del cliente:</h4>
                <p style="color: #4F4F4F;"> Nombre del cliente:<br>
                    {{$var->Nombre_de_contacto}}<br>

                    Razón social:<br>
                    {{$var->Razonsocial}}<br>

                    RFC:<br>
                    {{$var->Rfc}}<br>

                    Correo electrónico:<br>
                    {{$var->Correo_electronico_1}}<br>

                    Fecha:<br>
                    04-04-2022
                </p>
                @endforeach

            </div>
            <div style="position:relative; right: -84%;" class="panel-body">
                Subtotal:
                $ {{Cart::getSubTotal()}}<br>
                Iva: $
                <?php
                $algo = Cart::getSubTotal() * 0.16;
                echo  $algo;
                ?><br>
                Total: $
                <?php
                $Iva = Cart::getSubTotal() * 0.16;
                $Total = Cart::getSubTotal() + $Iva;
                echo  $Total;
                ?>

            </div>
        </div>
    </div>
    <table width="100%" id="data-table-default2" class="table  table-bordered table-hover align-middle">
        <thead>
            <tr style="background-color:#D5DDE2; color: #000000; border:none;  ">

                <th data-orderable="false">id</th>
                <th width="20%" data-orderable="false">Nombre</th>
                <th width="20%" data-orderable="false">Precio c/u</th>
                <th width="20%" data-orderable="false">Cantidad</th>
                <th width="20%" data-orderable="false">Total</th>

            </tr>
        </thead>


        <tbody>
            @foreach(Cart::getContent() as $var)
            <tr>

                <td style='text-align:center; border:none;'>{{$var->id}}</td>
                <td style='text-align:center; border:none;'>{{$var->name}}</td>
                <td style='text-align:center; border:none; '>${{$var->price}}</td>
                <td style='text-align:center; border:none;'>{{$var->quantity}}</td>
                <?php
                $algo = $var->quantity * $var->price;
                echo $algo;
                echo "<td style='text-align:center; border:none;'>$" . $algo . "</td>";
                ?>

            </tr>

            @endforeach


        </tbody>

    </table>
    <p style="color: #B5B6B6;">------------------------------------------------------------------------------------------------------------------------------------</p>

</body>



</html>