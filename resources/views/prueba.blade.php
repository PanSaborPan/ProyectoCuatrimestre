<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de libreria</title>
</head>






<body>
    <h1>Probando</h1>
    <table id="data-table-default2" class="table  table-bordered table-hover align-middle">
        <thead>
            <tr>

                <th width="20%" data-orderable="false">id</th>
                <th width="20%" data-orderable="false">Nombre</th>
                <th width="20%" data-orderable="false">Precio c/u</th>
                <th width="20%" data-orderable="false">Cantidad</th>
                <th width="20%" data-orderable="false">Total</th>

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
                echo $algo;
                echo "<td>" . $algo . "</td>";
                ?>

            </tr>

            @endforeach


        </tbody>

    </table>
    <div style="position:relative; right: -84%;" class="panel-body">
        Subtotal:
        {{Cart::getSubTotal()}}

    </div>
    <div style="position:relative; right: -86%;" class="panel-body">
        Iva:
        <?php
        $algo = Cart::getSubTotal() * 0.16;
        echo $algo;
        ?>

    </div>
    <div style="position:relative; right: -85.5%;" class="panel-body">
        Total:
        <?php
        $Iva = Cart::getSubTotal() * 0.16;
        $Total = Cart::getSubTotal() + $Iva;
        echo $Total;
        ?>
    </div>
</body>



</html>