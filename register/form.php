<?php
    require_once('include/lib.php');
    $table = "fir";
    $table2 = "citizen";
    $flag = 1;
    $dbh = initDb();
      
      
    if (isset($_POST["Accused_name"]) && isset($_POST["Accuser_name"])  && isset($_POST["mob"]) && isset($_POST["date"]) && isset($_POST["description"])) 
    {   

        $accused_name = $_POST["Accused_name"];
        $accuser_name = $_POST["Accuser_name"];
        $adhar_id = $_POST["Adhar_id"];
        
        $date = $_POST["date"];
        $description = $_POST["description"];
        $mob = $_POST["mob"];
        $cid = time();
		$sql = "insert into fir values (:complaint_id,:date,:description,:Accused_name,:Accuser_name,:MobileNo)";           
	    $q = $dbh->prepare($sql);
	    $q->execute(array(':complaint_id'=>$cid,':date'=>$date, ':description'=>$description, ':Accused_name'=>$accused_name, ':Accuser_name' => $accuser_name, ':MobileNo'=>$mob));  
 
        
    }
    try {
            $sql = "SELECT * FROM " . $table;         
            $sql1 = "SELECT * FROM " . $table2;
            $stmt = $dbh->query($sql);
            $stmt1 = $dbh->query($sql1);

             if (!empty($stmt1)) {
                $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
                $proceed = true;
            }

        /*** echo number of columns ***/
            if (!empty($stmt)) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $proceed = true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage;
            } 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>FIR ENTRY </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="page-header">
    <h1>Police <small> Seva, Shanti and Nyaya!! </small></h1>
</div>

<!-- Pricing Table - START -->

  <div class="table-responsive">
    <table class="table">
        <thead>
	<tr>
	 <th>Particulars </th>
         <th> Data Entered </th>
	</tr>

        </thead>
        <tbody>
	<?php

    $i = 0;
    $fg = 1;
   while (!empty($result1[$i]['aadhar_id'])) {
        if ($result1[$i]['aadhar_id'] == $adhar_id)
            $fg = 0;
        $i++;
    }
    if ($fg == 1) {
        echo '<h3><center><b><font color = red>You cant complaint as Adhar ID is not in DB </font></b></center></h3>';

    }

		echo '<h3><center><b>Please Note Down Your Complain ID.</b></center></h3>';

		if ($flag && !$fg) {
				 echo '</br></br></br>';
            	 echo '<tr> <td> COMPLAIN ID </td><td>'.$cid. '</td> </tr>';
	            echo '<tr> <td> ACCUSED NAME </td><td>'.$accused_name. '</td> </tr>';
                 echo '<tr> <td> ACCUSER NAME </td><td>'.$accuser_name. '</td> </tr>';
		   		echo '<tr> <td> DATE </td><td>'.$date. '</td> </tr>';
		    	echo '<tr> <td> MOBILE NUMBER </td> <td>'.$mob.'</td></tr>';

            echo '<tr> <td> DESCRIPTION </td><td>'.$description. '</td> </tr>';
             


            echo '<h3>Your complain has been successfully regesitered.</h3>';
            echo '<h3>Message regarding your complain has been sent to your mobile number-</h3> ';
            
		     
		}
	?>
           
        </tbody>
    </table>
</div>

</div>

</body>
</html>
