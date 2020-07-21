<?php
define('DB_HOST','127.0.0.1');
define('DB_USER','homestead');
define('DB_PASS','secret');
define('DB_NAME','blintec_pdf');

function conectarMySql(){
    #Conectarse la base de datos
    $con = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }

    if($con->connect_error)
        die($con->connect_error);
    
    return $con;
}

function cerrarMySql(){
        exit(1);
}

function consulta($sql){
    $con=conectarMySql();

    $resultado = $con->query($sql);

    if($resultado->num_rows > 0){

        return $resultado;
    }
}

