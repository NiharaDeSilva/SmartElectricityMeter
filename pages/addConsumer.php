
<?php
	if($_POST){
		

			
			$success="";
			if(isset($_POST) and $_POST['submit']=="submit"){
				$cid=($_POST['consumerId']);
				$cname=($_POST['name']);
				$caddress=($_POST['address']);
				$ccity=($_POST['city']);
				$cdate=($_POST['registrationDate']);


			}
			
			
				$con = new MongoClient();
				$db = $con->SmartElectricityMeter;
				$consumer=$db->consumer;
				$qry=array("cid"=>$cid,"cname"=>$cname,"caddress"=>$caddress,"ccity"=>$ccity,"cdate"=>$cdate);
				$result=$consumer->insert($qry);
				if($result){
					header("Location:forms.html");
				}
	}

?>