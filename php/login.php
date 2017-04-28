
<?php      
session_start();
?>


<?php 

    try {
        // open connection to MongoDB server
        $conn = new MongoClient('localhost');

        // access database
        $db = $conn->Test;

        // access collection
        $collection = $db->employee;

        $employeeId = $_POST['emp_id'];
        $password = $_POST['password'];

        $user = $collection->findone(array('emp_id' => intval($employeeId), 'password' => $password));

        $_SESSION['loggedInUser'] = $employeeId;

        if($user){
            ?>
            <script type="text/javascript">
            alert('redirecting <?php echo $_SESSION['loggedInUser']; ?>');
            window.location = "../pages/index.php";
            </script><?php
        }else{
            ?>
            <script type="text/javascript">
            alert("Consumer ID or Password invalid");
            window.location = "../pages/login.html";
            </script><?php
        }

        // disconnect from server
        $conn->close();

    } catch (MongoConnectionException $e) {
        die('Error connecting to MongoDB server');
    } catch (MongoException $e) {
        die('Error: ' . $e->getMessage());
    }

//$_SESSION["loggedInUser"] = $correct;

?>
