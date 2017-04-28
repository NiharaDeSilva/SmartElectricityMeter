<?php
//echo phpinfo();
//echo "ascsc";
/*namespace MongoDB\Tests;
use MongoDB\Client;
use MongoDB\Driver\ReadConcern;
use MongoDB\Driver\ReadPreference;
use MongoDB\Driver\WriteConcern;
*/
?>
<html>

<head>

<Title>Registration Form</Title>

<style type="text/css">

    body { background-color: #fff; border-top: solid 10px #000;

        color: #333; font-size: .85em; margin: 20px; padding: 20px;

        font-family: "Segoe UI", Verdana, Helvetica, Sans-Serif;

    }

    h1, h2, h3,{ color: #000; margin-bottom: 0; padding-bottom: 0; }

    h1 { font-size: 2em; }

    h2 { font-size: 1.75em; }

    h3 { font-size: 1.2em; }

    table { margin-top: 0.75em; }

    th { font-size: 1.2em; text-align: left; border: none; padding-left: 0; }

    td { padding: 0.25em 2em 0.25em 0em; border: 0 none; }
    db
</style>

</head>

<body>

<h1>Register here!</h1>

<p>hiiiiiiiiiiFill in your name and email address, then click <strong>Submit</strong> to register.</p>

<form method="post" action="index.php" enctype="multipart/form-data" >

      Name  <input type="text" name="name" id="name"/></br>

      Email <input type="text" name="email" id="email"/></br>

      <input type="submit" name="submit" value="Submit" />

</form>

<?php
echo "ascsc";
ini_set("display_errors", "On");
require 'vendor/autoload.php'; // include Composer's autoloader
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

    echo 'Caught exception: ',  $e->getMessage(), "<br />";

}

 

if(!empty($_POST)) {

    try{

        $registration = array("name" => $_POST['name'], "email" => $_POST['email'], "date" => date("Y-m-d"));

        $registrations->insertOne($registration);

        echo "<h3>Your're registered!</h3>";

    } catch (Exception $e){

        echo 'Caught exception: ',  $e->getMessage(), "<br />";

    }

}        

 

try{

 

    $registrants = $registrations->find();

 

    if(count($registrants) > 0){

        echo "<h2>People who are registered:</h2>";

        echo "<table>";

        echo "<tr><th>Name</th>";

        echo "<th>Email</th>";

        echo "<th>Date</th></tr>";

        foreach($registrants as $registrant){

            echo "<tr><td>".$registrant['name']."</td>";

            echo "<td>".$registrant['email']."</td>";

            echo "<td>".$registrant['date']."</td></tr>";

        }

        echo "</table>";

    } else {

        echo "<h3>No one is currently registered.</h3>";

    }

} catch (Exception $e) {

    echo "<pre>";

    print_r($e);

    echo "</pre>";

}

?>

</body>

</html>