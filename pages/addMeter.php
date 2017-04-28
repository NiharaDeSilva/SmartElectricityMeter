
<?php
	if($_POST){
		

			
			$success="";
			if(isset($_POST) and $_POST['submit']=="submit"){
				$mid=($_POST['meterId']);
				$cid=($_POST['consumerId']);
				$date=($_POST['startDate']);
				$pwd=($_POST['password']);

			}
			
			
				$con = new MongoClient();
				$db = $con->SmartElectricityMeter;
				$meter=$db->meter;
				$qry=array("mid"=>$mid,"cid"=>$cid,"date"=>$date,"pwd"=>$pwd);
				$result=$meter->insert($qry);
				if($result){
					header("Location:meterForm.html");
				
			}
	}

?>