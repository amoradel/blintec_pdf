<?php
require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

use App\Cotizacion;



$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => '192.168.10.10',
    'database'  => 'blintec_pdf',
    'username'  => 'homestead',
    'password'  => 'secret',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();


// $cotizacion= DB::table('affiliates as a')
//                         ->join('payment_frequencies as pf','a.payment_frequency_id','=','pf.id')
//                         ->select(
//                             'a.id',
//                             'a.full_name',
//                             'a.christmas_saving',
//                             'a.life_insurance',
//                             'a.loan_fee',
//                             'a.loan_interest',
//                             'a.obligatory_saving',
//                             'a.removable_saving',
//                             'pf.frequency',
//                             'pf.description as frequency_description'
//                         )
//                         ->where('a.id',$id)
//                         ->get();


function imprimirTabla(){
    $cotizacion = Cotizacion::all();

    foreach ($cotizacion as $key => $coti) {
        echo '<tr>';
            echo "<td> $coti->id_cotizador </td>";
            echo "<td> $coti->num_cotizacion </td>";
            echo "<td> $coti->id_remitente </td>";
            echo "<td> $coti->referencia </td>";
            echo "<td> $coti->fecha_emision </td>";
            echo "<td> $coti->num_factura </td>";
            echo "<td> $coti->num_compra </td>";
            echo "<td> $coti->id_cliente </td>";
            echo "<td> $coti->total </td>";
            // echo '<td> <a href="'.$coti->id_cotizador.'" class="btn btn-primary">Crear PDF</a> </td>' ;
            echo '<td> <a href="/crearPdf.php" target="_blank" class="btn btn-primary">Crear PDF</a> </td>' ;
        echo '</tr>';
    }
}




