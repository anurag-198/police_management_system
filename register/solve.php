<?php
    require_once('include/lib.php');
    $table = 'citizen';
    $flag = 1;
    $dbh = initDb();
    $check = 0;
      
    if (isset($_POST["adhar_id"]) && isset($_POST["f_name"])  && isset($_POST["s_name"]) && isset($_POST["date"]) && isset($_POST["contact"])) 
    {   
        echo "hello";

        $adhar_id = $_POST["adhar_id"];
        $f_name = $_POST["f_name"];
        $s_name = $_POST["s_name"];
        $date = $_POST["date"];
        $contact = $_POST["contact"];

		$sql = "insert into citizen values (:aadhar_id,:f_name,:s_name,:date,:contact)";           
	    $q = $dbh->prepare($sql);
	    $q->execute(array(':aadhar_id'=>$adhar_id,':f_name'=>$f_name, ':s_name'=>$s_name, ':date'=>$date, ':contact' => $contact));  
        $check = 1;
        
    }
  
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Get CITIZEN Compalin Details Here </title>
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

<center>
<div class="container">
    <div class="row">
        <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                   <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                
                <div class="form-group">
                    <label for="ComplaintId">Enter Complaint Id</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="ComplaintId" name="cid" placeholder="complaint id" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
               
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>
        </form>
        <div class="col-lg-5 col-md-push-1">
            <div class="col-md-12">
          <!--   <?php if($flag1 == 2) {?>
                <div class="alert alert-success">
                    <strong><span class="glyphicon glyphicon-ok"></span> Success! Message sent.</strong>
                </div><?php } ?>
              --> 
                    
            </div>
        </div>
        
    </div>


<!-- Pricing Table - START -->

  <div class="table-responsive">
    <table class="table">
        <thead>

        </thead>
        <tbody>
    <?php

    $table1 = 'citizen_complaint'; 
    $table2 = 'citizen';

     if ( isset($_POST["cid"]))
    {
        $flag1 = 1;
        $cid = $_POST["cid"];

    }
     else 
        $flag1 = 0;
        $flag2 = 0;

        $aid = '';

      try {
            $sql = "SELECT * FROM " . $table1;           
            $sql1 = "SELECT * FROM " . $table2;
            $stmt = $dbh->query($sql);
             $stmt1 = $dbh->query($sql1);
            if (!empty($stmt)) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);                
                $proceed = true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage;
            }

             if (!empty($stmt1)) {
                $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
                $proceed = true;
            }
        $i = 0;
         while (!empty($result[$i]['complaint_id'])) {
                if ($result[$i]['complaint_id'] == $cid) {
                    $flag2 = 1;
                }
        $i++;
        }
        echo "</br></br></br>";
         $i = 0;

        if ($flag2) {
            while (!empty($result[$i]['complaint_id'])) {
                if ($result[$i]['complaint_id'] == $cid) {
                    $j = 0;
                   while (!empty($result1[$j]['aadhar_id'])) {
                        if ($result[$i]['aadhar_id'] == $result1[$j]['aadhar_id']) {
                            echo '<tr> <td> Name </td><td>'.$result1[$j]['f_name']. '  '.$result1[$j]['s_name'].'</td> </tr>';  
                      echo '<tr> <td> contact </td><td>'.$result1[$j]['contact']. '</td> </tr>';
                      echo '<tr> <td> Date of birth </td><td>'.$result1[$j]['dob']. '</td> </tr>';
                      break;
                }
                $j++;
            }
            }
        $i++;
        }
    }
    else {
        echo "<b><font color = red><h1>Complaint ID not in Database </h1></font></b>";
    }
   ?>
           
        </tbody>
    </table>
</div>
</center>

</div>

</body>
</html>
