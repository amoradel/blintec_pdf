<?php

require_once 'bd.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Cotizacion;

$cotizacion = new Cotizacion;

function formateoFecha($fecha){
    return date("d/m/Y", strtotime($fecha));
}

function imprimirTabla(){
$query= Capsule::table('cotizacion AS co')
                        ->join('clientes AS cli','co.id_cliente','=','cli.id_cliente')
                        ->join('users AS u','co.id_remitente','=','u.id')
                        ->select(
                            'co.id_cotizador', 
                            'co.num_cotizacion', 
                            'co.id_remitente', 
                            'co.referencia', 
                            'co.fecha_emision', 
                            'co.num_factura', 
                            'co.introduccion', 
                            'co.expiracion', 
                            'co.total',
                            'cli.nombre as cliente', 
                            'cli.rtn', 
                            'u.name as remitente', 
                            'u.email as remitente_correo', 
                            'u.telefono as remitente_telefono'
                        )
                        // ->where('a.id',$id)
                        ->get();

    foreach ($query as $key => $coti) {
        echo '<tr>';
            echo "<td> $coti->id_cotizador </td>";
            echo "<td> $coti->num_cotizacion </td>";
            echo "<td> $coti->cliente </td>";
            echo "<td> $coti->rtn </td>";
            echo "<td> $coti->remitente </td>";
            echo "<td> $coti->referencia </td>";
            echo '<td>'. formateoFecha($coti->fecha_emision) .'</td>';
            echo "<td> $coti->total </td>";
            echo '<td> <a href="crearPdf.php?id='.$coti->id_cotizador.'" target="_blank" class="btn btn-primary">Crear PDF</a> </td>' ;
        echo '</tr>';
    }
}

function cargarEncabezado($id){
    $encabezado= Capsule::table('cotizacion AS co')
                        ->join('clientes AS cli','co.id_cliente','=','cli.id_cliente')
                        ->join('users AS u','co.id_remitente','=','u.id')
                        ->join('compras_monedas AS cm','co.moneda','=','cm.id')
                        ->select(
                            'co.id_cotizador', 
                            'co.num_cotizacion', 
                            'co.id_remitente', 
                            'co.referencia', 
                            'co.fecha_emision as fecha', 
                            'co.num_factura', 
                            'co.introduccion', 
                            'co.expiracion', 
                            'co.subtotal',
                            'co.iva',
                            'co.total',
                            'cm.moneda',
                            'cli.nombre as cliente', 
                            'cli.rtn', 
                            'u.name as user', 
                            'u.email as user_correo', 
                            'u.telefono as user_telefono'
                        )
                        ->where('co.id_cotizador',$id)
                        ->get();

    return $encabezado;
}

function cargarDetalle($id){
    $detalle= Capsule::table('cotizacion AS co')
                        ->join('cotizacion_lista AS cl','co.id_cotizador','=','cl.id_cotizacion')
                        ->join('productos AS p','cl.id_producto','=','p.id')
                        ->select(
                            'co.id_cotizador', 
                            'cl.id_lista',
                            'p.descripcion as producto',
                            'cl.cantidad',
                            'cl.precio',
                            'cl.total'
                        )
                        ->where('co.id_cotizador',$id)
                        ->get();

    return $detalle;
}
