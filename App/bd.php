<?php

function conectarMySql(){
    $conexion = mysqli_connect("127.0.0.1","homestead", "secret", "blintec_pdf");

    if($conexion->connect_error)
        die($conexion->connect_error);
    
        return $conexion;
}

function cerrarMySql(){
        exit(1);
}

function consulta($sql){
    $conexion=conectarMySql();

    $resultado = $conexion->query($sql);

    if($resultado->num_rows > 0){
        // while($fila = $resultado->fetch_assoc()){
        //     print "{$fila["remitente"]} \n";
        // }


        return $resultado;
    }
}


// consulta("SELECT co.id_cotizador, co.num_cotizacion, co.id_remitente, co.referencia, co.fecha_emision, co.num_factura, co.introduccion, co.expiracion, co.total, cli.nombre AS cliente, cli.rtn, u.name AS remitente, u.email AS remitente_correo, u.telefono AS remitente_telefono FROM blintec_pdf.cotizacion AS co JOIN blintec_pdf.clientes AS cli ON co.id_cliente = cli.id_cliente JOIN blintec_pdf.users AS u ON co.id_remitente = u.id;");