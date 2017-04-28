<?php
ini_set("display_errors", "On");
require '../vendor/autoload.php'; // include Composer's autoloader
/*
$client = new MongoDB\Client("mongodb://group21:ucscgroup21@ds062059.mlab.com:62059/elec-man");
$collection = $client->selectCollection('elec-man', 'Meter');

$result = $collection->insertOne( [ 'name' => 'Hinterland', 'brewery' => 'BrewDog' ] );

echo "Inserted with Object ID '{$result->getInsertedId()}'";
 */

try{

    $db = new MongoDB\Client("mongodb://group21:ucscgroup21@ds062059.mlab.com:62059/elec-man");

    $registrations = $db->selectCollection('elec-man', 'Meter');

} catch (Exception $e){

    echo "&&&ERROR&&&";

}
 

if(!empty($_GET)) {

    try{

        $registration = array("name" => $_GET['id'], "email" => $_GET['read'], "date" => date("Y-m-d"));

        $registrations->insertOne($registration);

        echo "&&&SUCCESS&&&";

    } catch (Exception $e){

        echo "&&&ERROR&&&";

    }

}