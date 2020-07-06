<?php
    require_once 'vendor/autoload.php';
    require_once 'App/controller.php';

    $id = $cotizacion->getId();

    $encabezado = cargarEncabezado($id);
    $detalle = cargarDetalle ($id);

    $cantidad_detalle =20;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COTIZACIÓN #<?php echo $encabezado[0]->id_cotizador; ?> </title>

    <style type="text/css">
        html {
            margin: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0mm 8mm 2mm 8mm;
        }

        hr {
            page-break-after: always;
            border: 0;
            margin: 0;
            padding: 0;
        }

        .container {
            padding-left: 0px; */
            margin-right: auto;
            margin-left: auto;
        }

        .boxes {
            border-style: solid;
            border-width: 1px;
            border-color: darkgray;
            border-radius: 5px;
        }

        .carta-vertical {
            width: 750px;
            left: 8mm;
        }

        td.col-cliente {
            width: 65%;
        }

        td.col-contacto {
            width: 35%;
        }

        table.encabezado {
            position: fixed;
            top: 320px;
            border-collapse: collapse;
            font-size: 14px;
        }

        table.encabezado thead {
            background: #EEEEEE;
            border-bottom: 5px solid #606060;
        }

        table.detalle {
            position: absolute;
            top: 355px;
            border-collapse: collapse;
            font-size: 14px;
            width: 750px;
        }

        table.detalle td,
        th {
            border: 1px solid #AAAAAA;
            padding: 5px 3px;
        }

        th.numero {
            width: 6%;
        }

        td.numero {
            width: 6%;
        }

        th.servicio {
            width: 52%;
        }

        td.servicio {
            width: 52%;
        }

        th.cantidad {
            width: 10%;
            text-align: right;
        }

        td.cantidad {
            width: 10%;
            text-align: right;
        }

        th.valor {
            width: 16%;
            text-align: right;
        }

        td.valor {
            width: 16%;
            text-align: right;
        }

        table.info {
            position: absolute;
            top: 805px;
            left: 539px;
            border-collapse: collapse;
            font-size: 13px;
            width: 210px;
        }

        table.info td {
            border: 1px solid darkgray;
            padding: 5px 3px;
        }

        td.col-cuenta-titulo {
            width: 34%;
            text-align: center;
        }

        td.col-cuenta-valor {
            width: 66%;
            text-align: right;
        }
    </style>
</head>

<body>
    <table class="carta-vertical" style="position:fixed;">
        <tr>
            <td style="width: 19%; vertical-align: bottom; text-align: center;">
                <img src="blintec_logo.jpg" alt="" width="105px">
            </td>
            <td style="width: 60%;">
                <div>
                    <h2 style="margin-bottom: 5px; font-size: 18px;">Blindajes y Tecnologias Israelitas S.A.</h2>
                </div>
                <div
                    style="border-left-color:darkgray; border-left-style:solid; border-width: 2px; padding-left: 3px; font-size: 13px">
                    Correo: gerencia@blintechn.com
                    <br>Teléfono: 2244-9220
                    <br>Dirección: Anillo periférico 700 mts antes del desvió a Valle de Ángeles Contiguo a Bodega
                    de MotoMundo, Tegucigalpa, Honduras.
                    <br>Giro: Blindaje y Mantenimiento de Vehículos.
                    <br>RTN: 0801-9015-798479
                </div>
            </td>
            <td style="width: 28%; vertical-align: middle; border: 1px; ">
                <div class="boxes" style="margin: 0 0 0 0;">
                    <h4 style="text-align: center; margin-top: 15px;">N° COTIZACIÓN</h4>
                    <h2 style="text-align: center; margin-top: 0px; margin-bottom: 15px;"><?php echo $encabezado[0]->id_cotizador; ?> </h2>
                </div>
                <div class="boxes" style="margin-top: 5px; text-align: center; padding: 2px; font-size: 14px;">
                    Fecha: <?php echo formateoFecha($encabezado[0]->fecha); ?> 
                </div>
            </td>
        </tr>
    </table>

    <table class="boxes carta-vertical" style=" position: fixed; top: 150px; padding: 5px; font-size: 13px; ">
        <tr>
            <td class="col-cliente"><strong>Cliente: <?php echo $encabezado[0]->cliente; ?> </strong></td>
            <td class="col-contacto">Contacto: <?php echo $encabezado[0]->user; ?> </td>

        </tr>
        <tr>
            <td class="col-cliente">RTN: <?php echo $encabezado[0]->rtn; ?> </td>
            <td class="col-contacto">Teléfono: <?php echo $encabezado[0]->user_telefono; ?> </td>

        </tr>
        <tr>
            <td class="col-cliente"><strong>Vehiculo: NISSAN PATHFINDER</strong></td>
            <td class="col-contacto">Correo: <?php echo $encabezado[0]->user_correo; ?> </td>

        </tr>
        <tr>
            <td class="col-cliente"><strong>Vin: VSKJVWR5120438544</strong></td>
            <td class="col-contacto"></td>

        </tr>
    </table>

    <table class="carta-vertical" style="position:fixed; top: 255px; font-size: 13px;">
        <tr>
            <td>Introducción predeterminada</td>
        </tr>
    </table>

    <table class="carta-vertical encabezado">
        <thead>
            <tr>
                <th class="numero">#</th>
                <th class="servicio">Servicio / Producto</th>
                <th class="cantidad">Cantidad</th>
                <th class="valor">Valor</th>
                <th class="valor">Total</th>
            </tr>
        </thead>
    </table>

    <table class="detalle">
        <tbody>
            <?php
            $i=0;
            foreach ($detalle as $key => $de) {
                $i++;
            ?>
            <tr>
                <td class="numero"><?php echo $i; ?> </td>
                <td class="servicio"><?php echo $de->producto; ?> </td>
                <td class="cantidad"><?php echo $de->cantidad; ?> </td>
                <td class="valor">L <?php echo formateoNumero($de->precio); ?> </td>
                <td class="valor">L <?php echo formateoNumero($de->total); ?> </td>
            </tr>
            <?php
                if ($detalle->count()>15 &&  $i%$cantidad_detalle==0) {
                    echo '</tbody> </table>';

                    echo '    <div class="boxes" style=" position:absolute; width: 750px; top: 990px; font-size: 12px;">
                                *Condiciones de pago: 50% de Anticipo y 50% Contra Entrega
                                <br>**Esta cotización puede variar ya que el avaluó fue basado en nuestra primera inspección y no cubre
                                gasto adicional que se presente al momento de desarmar el vehículo.
                                <br>***Validez de la oferta '. $encabezado[0]->expiracion. ' dias.
                            </div>';

                    echo '<hr>'; //Salto de pagina

                    echo '<table class="detalle"> <tbody>';
                }

            }
            ?>
        </tbody>
    </table>

    <table class="info">
        <tr>
            <td class="col-cuenta-titulo">Moneda:</td>
            <td class="col-cuenta-valor"><?php echo $encabezado[0]->moneda; ?> </td>
        </tr>
        <tr>
            <td class="col-cuenta-titulo">Neto:</td>
            <td class="col-cuenta-valor">L <?php echo formateoNumero($encabezado[0]->subtotal); ?></td>
        </tr>
        <tr>
            <td class="col-cuenta-titulo">IVA (15%):</td>
            <td class="col-cuenta-valor">L <?php echo formateoNumero($encabezado[0]->iva); ?></td>
        </tr>
        <tr>
            <td class="col-cuenta-titulo">Total:</td>
            <td class="col-cuenta-valor">L <?php echo formateoNumero($encabezado[0]->total); ?></td>
        </tr>
    </table>

    <table style="position:absolute; width: 750px; top: 920px; font-size: 13px; border-top: 1px solid darkgray;">
        <tr>
            <td>Conclusión predeterminada</td>
        </tr>
    </table>


    <div class="boxes" style=" position:absolute; width: 750px; top: 990px; font-size: 12px;">
        *Condiciones de pago: 50% de Anticipo y 50% Contra Entrega
        <br>**Esta cotización puede variar ya que el avaluó fue basado en nuestra primera inspección y no cubre
        gasto adicional que se presente al momento de desarmar el vehículo.
        <br>***Validez de la oferta <?php echo $encabezado[0]->expiracion; ?> dias.
    </div>

</body>

</html>
