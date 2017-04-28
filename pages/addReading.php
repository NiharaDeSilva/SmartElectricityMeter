
<?php
	if($_POST){
		

			
			$success="";
			if(isset($_POST) and $_POST['submit']=="submit"){
				$rid=($_POST['readId']);
				$mid=($_POST['meterId']);
				$time=($_POST['time']);
				$units=($_POST['units']);

			}
			
			
				$con = new MongoClient();
				$db = $con->SmartElectricityMeter;
				$read=$db->readings;
				$qry=array("rid"=>$rid,"mid"=>$mid,"time"=>$time,"units"=>$units);
				$result=$read->insert($qry);
				if($result){
					echo "done";
				
			}
	}

?>