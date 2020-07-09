<?php

require_once 'bd.php';
require_once 'Cotizacion.php';

$cotizacion = new Cotizacion;

function formateoFecha($fecha){
    return date("d/m/Y", strtotime($fecha));
}

function formateoNumero($numero){
    return number_format($numero,2,'.',',');
}

function imprimirTabla(){
    
    $query = consulta("SELECT co.id_cotizador, co.num_cotizacion, co.id_remitente, co.referencia, co.fecha_emision, co.num_factura, co.introduccion, co.expiracion, co.total, cli.nombre AS cliente, cli.rtn, u.name AS remitente, u.email AS remitente_correo, u.telefono AS remitente_telefono FROM blintec_pdf.cotizacion AS co JOIN blintec_pdf.clientes AS cli ON co.id_cliente = cli.id_cliente JOIN blintec_pdf.users AS u ON co.id_remitente = u.id;");

    // var_dump($query->num_rows);

    foreach ($query as $key => $coti) {
            echo '<tr>';
            echo '<td> '.$coti['id_cotizador'].' </td>';
            echo '<td> '.$coti['num_cotizacion'].' </td>';
            echo '<td> '.$coti['cliente'].' </td>';
            echo '<td> '.$coti['rtn'].' </td>';
            echo '<td> '.$coti['remitente'].' </td>';
            echo '<td> '.$coti['referencia'].' </td>';
            echo '<td> '. formateoFecha($coti['fecha_emision']) .'</td>';
            echo '<td> '.$coti['total'].' </td>';
            echo '<td> <a href="crearPdf.php?id='.$coti['id_cotizador'].'" target="_blank" class="btn btn-primary">Crear PDF</a> </td>' ;
        echo '</tr>';
    }

    // cerrarMySql();
}

function cargarEncabezado($id){


    $encabezado = consulta('SELECT 
        co.id_cotizador,
        co.num_cotizacion,
        co.id_remitente,
        co.referencia,
        co.fecha_emision AS fecha,
        co.num_factura,
        co.introduccion,
        co.expiracion,
        co.subtotal,
        co.iva,
        co.total,
        cm.moneda,
        cli.nombre AS cliente,
        cli.rtn,
        u.name AS user,
        u.email AS user_correo,
        u.telefono AS user_telefono
    FROM
        blintec_pdf.cotizacion AS co
            JOIN
        blintec_pdf.clientes AS cli ON co.id_cliente = cli.id_cliente
            JOIN
        blintec_pdf.users AS u ON co.id_remitente = u.id
        JOIN
        blintec_pdf.compras_monedas AS cm ON co.moneda = cm.id
    WHERE
        co.id_cotizador='.$id.';');

    return $encabezado->fetch_assoc();
}

function cargarDetalle($id){
    $detalle = consulta('SELECT 
        co.id_cotizador,
        cl.id_lista,
        p.descripcion AS producto,
        cl.cantidad,
        cl.precio,
        cl.total
    FROM
        blintec_pdf.cotizacion AS co
            JOIN
        blintec_pdf.cotizacion_lista AS cl ON co.id_cotizador = cl.id_cotizacion
            JOIN
        blintec_pdf.productos AS p ON cl.id_producto = p.id
    WHERE co.id_cotizador='.$id.';');

    return $detalle;
}
