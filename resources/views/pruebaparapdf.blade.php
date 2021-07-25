<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - #123</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            border-bottom: 5px solid #10b981;
            color: #000;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }

        .table2 {
           width: 100%;
           text-align: left;
           border-collapse: collapse;
           margin: 0 0 1em 0;
           caption-side: top;
           margin-bottom: 0px;
        }


        .thclass, .tdclass{
           border: 1px solid #000;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>

            <td align="left" style="padding-right: 20px">
                <img src="../public/img/logo_las_lomas-05.png" style="height: 50px" class="logo" alt="">
                {{-- <img src="/path/to/logo.png" alt="Logo" width="64" class="logo"/> --}}
            </td>
            <td align="left" style="width: 40%;">
                <label class="t2">SIDERURGICA LAS LOMAS LTDA.</label> <br>
                <label class="t1">
                    PLANTA DON CARLOS, KM 85 AL NORTE<br>
                    TELF.: +591 3 3593500 <br>
                    SANTA CRUZ - BOLIVIA
                </label>
            </td>
            <td align="right" style="width: 40%;">
                <label class="t3">Fecha: {{ $fecha }}</label>
            </td>
        </tr>

    </table>
</div>


<br/>

<div class="invoice">
    <h3>Inventario</h3>
    <table width="100%" class="table2">
        <thead>
        <tr>
            <th class="thclass">Equipo</th>
            <th class="thclass">Tipo</th>
            <th class="thclass">Marca</th>
            <th class="thclass">Stock</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($items as $item)
        <tr>
            <td colspan="1" class="tdclass">{{ $item->nombre }}</td>
            <td align="left" class="tdclass">{{$item->tipoEquipo->nombre}}</td>
            <td align="left" class="gray tdclass">{{$item->marca->nombre}}</td>
            <td align="center" class="gray tdclass">{{$item->Stock}}</td>
        </tr>
        @empty

        @endforelse
        </tbody>

        <tfoot>

        </tfoot>
    </table>
</div>


</body>
</html>
