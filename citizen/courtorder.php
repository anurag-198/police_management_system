<?php
    require_once('include/lib.php');
    $table = "court_order";
    $flag = 1;
    $flag1 = 1;
    $dbh = initDb();
    try {
            $sql = "SELECT * FROM " . $table;           
            $stmt = $dbh->query($sql);
        /*** echo number of columns ***/
            if (!empty($stmt)) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $proceed = true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage;
            }   
      
    if ( isset($_POST["cid"]))
    {
        $flag1 = 2;
        $cid = $_POST["cid"];
    }
     else 
        $flag1 = 0;

   
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>COURT ORDER </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body background="bg2.jpg">
<div class="page-header">
    <center><h1>Police <small> Seva, Shanti and Nyaya!! </small></h1></center>
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

            <?php if($flag1 == 2) {?>
                <div class="alert alert-success">
                    <strong><span class="glyphicon glyphicon-ok"></span> Success! Message sent.</strong>
                </div><?php } ?>
               
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
        echo "</br></br></br>";
         $i = 0;
        if ($flag1) {
            while (!empty($result[$i]['complaint_id'])) {
                if ($result[$i]['complaint_id'] == $cid) {
                      echo '<tr> <td> Complaint Id </td><td>'.$result[$i]['complaint_id']. '</td> </tr>';  
                      echo '<tr> <td> Date </td><td>'.$result[$i]['date']. '</td> </tr>';
                      echo '<tr> <td> Description </td><td>'.$result[$i]['description']. '</td> </tr>';
                      break;
                }
                $i++;
            }
        }
	?>
           
        </tbody>
    </table>
</div>
</center>

</div>

</body>
</html>
