<?php
    require_once 'bd.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
    <title>Reporte</title>

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
            /* width: 100%; */
            /* padding-right: 0px;
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
            width: 40%;
        }

        td.col-contacto {
            width: 37%;
        }

        td.col-cuenta-titulo {
            width: 6%;
        }

        td.col-cuenta-valor {
            width: 17%;
            text-align: right;
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
            position: fixed;
            top: 885px;
            left: 570px;
            border-collapse: collapse;
            font-size: 13px;
            width: 210px;
        }

        table.info td {
            border: 1px solid darkgray;
            padding: 5px 3px;
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
                    <h2 style="text-align: center; margin-top: 0px; margin-bottom: 15px;">18</h2>
                </div>
                <div class="boxes" style="margin-top: 5px; text-align: center; padding: 2px; font-size: 14px;">
                    Fecha: 2020-05-23
                </div>
            </td>
        </tr>
    </table>

    <table class="boxes carta-vertical" style=" position: fixed; top: 150px; padding: 5px; font-size: 13px; ">
        <tr>
            <td class="col-cliente"><strong>Cliente: Granjas Marinas</strong></td>
            <td class="col-contacto">Contacto: JOSE LUQUE</td>
            <!-- <td class="col-cuenta-titulo">Subtotal</td>
            <td class="col-cuenta-valor">L 10,103,544.88</td> -->
        </tr>
        <tr>
            <td class="col-cliente">RTN: 0703199300340</td>
            <td class="col-contacto">Teléfono: 94400522</td>
            <!-- <td class="col-cuenta-titulo">Descuento</td>
            <td class="col-cuenta-valor">L 1,010,354.48</td> -->
        </tr>
        <tr>
            <td class="col-cliente"><strong>Vehiculo: NISSAN PATHFINDER</strong></td>
            <td class="col-contacto">Correo: jluque@blintechn.com</td>
            <!-- <td class="col-cuenta-titulo">IVA (15%)</td>
            <td class="col-cuenta-valor">L 1,515,531.73</td> -->
        </tr>
        <tr>
            <td class="col-cliente"><strong>Vin: VSKJVWR5120438544</strong></td>
            <td class="col-contacto"></td>
            <!-- <td class="col-cuenta-titulo">Total</td>
            <td class="col-cuenta-valor">L 9,598,367.63</td> -->
        </tr>
    </table>

    <table class="carta-vertical" style="position:fixed; top: 250px; font-size: 13px;">
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
            <tr>
                <td class="numero">1</td>
                <td class="servicio">AMORTIGUADOR LH HILUX 4X4</td>
                <td class="cantidad">1</td>
                <td class="valor">L 1,300.00</td>
                <td class="valor">L 1,300.00</td>
            </tr>
            <tr>
                <td class="numero">2</td>
                <td class="servicio">AMORTIGUADOR LH HILUX 4X4</td>
                <td class="cantidad">1</td>
                <td class="valor">L 1,300.00</td>
                <td class="valor">L 1,300.00</td>
            </tr>
            <tr>
                <td class="numero">3</td>
                <td class="servicio">AMORTIGUADOR LH HILUX 4X4</td>
                <td class="cantidad">1</td>
                <td class="valor">L 1,300.00</td>
                <td class="valor">L 1,300.00</td>
            </tr>
            <tr>
                <td class="numero">3</td>
                <td class="servicio">AMORTIGUADOR LH HILUX 4X4</td>
                <td class="cantidad">1</td>
                <td class="valor">L 1,300.00</td>
                <td class="valor">L 1,300.00</td>
            </tr>
            <tr>
                <td class="numero">3</td>
                <td class="servicio">AMORTIGUADOR LH HILUX 4X4</td>
                <td class="cantidad">1</td>
                <td class="valor">L 1,300.00</td>
                <td class="valor">L 1,300.00</td>
            </tr>
            <tr>
                <td class="numero">3</td>
                <td class="servicio">AMORTIGUADOR LH HILUX 4X4</td>
                <td class="cantidad">1</td>
                <td class="valor">L 1,300.00</td>
                <td class="valor">L 1,300.00</td>
            </tr>
            <tr>
                <td class="numero">3</td>
                <td class="servicio">AMORTIGUADOR LH HILUX 4X4</td>
                <td class="cantidad">1</td>
                <td class="valor">L 1,300.00</td>
                <td class="valor">L 1,300.00</td>
            </tr>
            <tr>
                <td class="numero">3</td>
                <td class="servicio">AMORTIGUADOR LH HILUX 4X4</td>
                <td class="cantidad">1</td>
                <td class="valor">L 1,300.00</td>
                <td class="valor">L 1,300.00</td>
            </tr>
            <tr>
                <td class="numero">3</td>
                <td class="servicio">AMORTIGUADOR LH HILUX 4X4</td>
                <td class="cantidad">1</td>
                <td class="valor">L 1,300.00</td>
                <td class="valor">L 1,300.00</td>
            </tr>
            <tr>
                <td class="numero">3</td>
                <td class="servicio">AMORTIGUADOR LH HILUX 4X4</td>
                <td class="cantidad">1</td>
                <td class="valor">L 1,300.00</td>
                <td class="valor">L 1,300.00</td>
            </tr>
            <tr>
                <td class="numero">3</td>
                <td class="servicio">AMORTIGUADOR LH HILUX 4X4</td>
                <td class="cantidad">1</td>
                <td class="valor">L 1,300.00</td>
                <td class="valor">L 1,300.00</td>
            </tr>
            <tr>
                <td class="numero">3</td>
                <td class="servicio">AMORTIGUADOR LH HILUX 4X4</td>
                <td class="cantidad">1</td>
                <td class="valor">L 1,300.00</td>
                <td class="valor">L 1,300.00</td>
            </tr>
            <tr>
                <td class="numero">3</td>
                <td class="servicio">AMORTIGUADOR LH HILUX 4X4</td>
                <td class="cantidad">1</td>
                <td class="valor">L 1,300.00</td>
                <td class="valor">L 1,300.00</td>
            </tr>
            <tr>
                <td class="numero">3</td>
                <td class="servicio">AMORTIGUADOR LH HILUX 4X4</td>
                <td class="cantidad">1</td>
                <td class="valor">L 1,300.00</td>
                <td class="valor">L 1,300.00</td>
            </tr>
            <tr>
                <td class="numero">3</td>
                <td class="servicio">AMORTIGUADOR LH HILUX 4X4</td>
                <td class="cantidad">1</td>
                <td class="valor">L 1,300.00</td>
                <td class="valor">L 1,300.00</td>
            </tr>
            <tr>
                <td class="numero">3</td>
                <td class="servicio">AMORTIGUADOR LH HILUX 4X4</td>
                <td class="cantidad">1</td>
                <td class="valor">L 1,300.00</td>
                <td class="valor">L 1,300.00</td>
            </tr>
        </tbody>
    </table>

    <table class="carta-vertical info">
        <tr>
            <td style="text-align: center; width: 34%;">Moneda:</td>
            <td style="text-align: right; width: 66%;">Lempira Hondureño</td>
        </tr>
    </table>

    <table class="carta-vertical" style="position:fixed; top: 920px; font-size: 13px; border-top: 1px solid darkgray;">
        <tr>
            <td>Conclusión predeterminada</td>
        </tr>
    </table>


    <div class=" boxes carta-vertical" style=" position:fixed; top: 990px; font-size: 12px;">
        *Condiciones de pago: 50% de Anticipo y 50% Contra Entrega
        <br>**Esta cotización puede variar ya que el avaluó fue basado en nuestra primera inspección y no cubre
        gasto adicional que se presente al momento de desarmar el vehículo.
        <br>***Validez de la oferta
    </div>

    <hr>

</body>

</html>