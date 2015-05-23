<?php
    require_once('include/lib.php');
    $table = "complaint";
    $table1 = "officer_record";
    $flag = 1;
    $flag1 = 1;
    $dbh = initDb();
    try {
            $sql = "SELECT * FROM " . $table;
            $sql1 =  "SELECT * FROM " . $table1;

            $stmt = $dbh->query($sql);
            $stmt1 = $dbh->query($sql1);

        /*** echo number of columns ***/
            if ((!empty($stmt)) && (!empty($stmt1))) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                 $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
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
    <title>GET YOUR CASE DETAILS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
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
                    <strong><span class="glyphicon glyphicon-ok"></span> Success! Data fetched .</strong>
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
         $res = '';
        if ($flag1) {
            while (!empty($result[$i]['complaint_id'])) {
                if ($result[$i]['complaint_id'] == $cid) {
                      echo '<tr> <td> Complaint Id </td><td>'.$result[$i]['complaint_id']. '</td> </tr>';  
                      echo '<tr> <td> Officer ID </td><td>'.$result[$i]['officer_id']. '</td> </tr>';
                      $res = $result[$i]['officer_id'];
                      echo '<tr> <td> Department name </td><td>'.$result[$i]['dept_name']. '</td> </tr>';
                      break;
                }
                $i++;
            }
        }
        $i = 0;
        while (!empty($result1[$i]['officer_id'])) {
                if ($result1[$i]['officer_id'] == $res) {
                      echo '<tr> <td> Officer name </td><td>'.$result1[$i]['f_name'].' '.$result1[$i]['s_name'].'</td> </tr>';  
                      echo '<tr> <td> Date of birth </td><td>'.$result1[$i]['dob']. '</td> </tr>';
                      echo '<tr> <td> Contact number </td><td>'.$result1[$i]['contact']. '</td> </tr>';
                      break;
                }
                $i++;
            }
    ?>
           
        </tbody>
    </table>
</div>
</center>

</div>

</body>
</html>
