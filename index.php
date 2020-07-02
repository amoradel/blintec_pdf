<?php
    require_once 'bd.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear PDF Blintec</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>

    <main class="container">
    <h1>Crear PDF Blintec</h1>

    <table class="table table-hover">
    <thead class="thead-dark">
        <tr>
            <th>Cotizador</th>
            <th># Cotización</th>
            <th>Remitente</th>
            <th>Referencia</th>
            <th>Fecha Emisión</th>
            <th># Factura</th>
            <th># Compra</th>
            <th>Cliente</th>
            <th>Total</th>
            <th>PDF</th>
        </tr>
    </thead>
    <tbody>
            <?php
                imprimirTabla();
            ?>
        
    </tbody>
    </table>
    </main>
    
</body>
</html>