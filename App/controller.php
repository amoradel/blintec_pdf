<?php

require_once 'bd.php';

use Illuminate\Database\Capsule\Manager as Capsule;


function imprimirTabla(){
$cotizacion2= Capsule::table('cotizacion AS co')
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

    foreach ($cotizacion2 as $key => $coti) {
        echo '<tr>';
            echo "<td> $coti->id_cotizador </td>";
            echo "<td> $coti->num_cotizacion </td>";
            echo "<td> $coti->cliente </td>";
            echo "<td> $coti->rtn </td>";
            echo "<td> $coti->remitente </td>";
            echo "<td> $coti->referencia </td>";
            echo "<td> $coti->fecha_emision </td>";
            echo "<td> $coti->total </td>";
            echo '<td> <a href="/crearPdf.php?id='.$coti->id_cotizador.'" target="_blank" class="btn btn-primary">Crear PDF</a> </td>' ;
        echo '</tr>';
    }
}


