
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <title>CITIZEN REGISTRATION FORM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link href="../datepicker/jquery-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="datepicker.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script> 
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script> 
</head>
<body background="bg.jpg">

<div class="container">

<div class="page-header">
    <h1>Citizen registration form <small> Please fill the particulars</small></h1>
</div>
<a href="../index.html"><button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> BACK</button></a>


<!-- Registration form - START -->
<div class="container">
    <div class="row">
        <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                   <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Aadhar ID</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="adhar_id" id="InputName" placeholder="Enter Name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputName">First name </label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="f_name" id="InputName" placeholder="Enter Name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputName">Second name </label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="s_name" id="InputName" placeholder="Enter Name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                 <div class="form-group">
               <label for="datepicker1">Enter Date</label>
                <div class='input-group date'  style="cursor:pointer;">
                     
                    <input type='text' class="form-control" id='datepicker1' name="date"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                </div>
                <div class="form-group">
                    <label for="ComplaintId">Mobile No</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="ComplaintId" name="contact" placeholder="Enter 10 Digit Number" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>
        </form>
        <div class="col-lg-5 col-md-push-1">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <strong><span class="glyphicon glyphicon-ok"></span> Success! Message sent.</strong>
                </div>
                <div class="alert alert-danger">
                    <span class="glyphicon glyphicon-remove"></span><strong> Warning! Please check all page inputs.</strong>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Registration form - END -->
<?php
    require_once('include/lib.php');
    $table = 'citizen';
    $flag = 1;
    $dbh = initDb();
    $check = 0;
      
    if (isset($_POST["adhar_id"]) && isset($_POST["f_name"])  && isset($_POST["s_name"]) && isset($_POST["date"]) && isset($_POST["contact"])) 
    {   

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

    if ($check) {
       echo '
            <div class="alert alert-success">
                    <strong><span class="glyphicon glyphicon-ok"></span> <center>Success! You are registerd !!!.</center></strong>
                </div>
            ';
    }
  
?>
</div>
 <script src="jquery.js"></script>
 <script src="jquery-ui.min.js"></script>
<script src="bootstrap.min.js"></script>
<script src="moment-with-locales.js"></script>
<script src="datepicker.js"></script>
<script type="text/javascript">
    $(function () {
                $('#datepicker1').datepicker();
            });


</script>

</body>
</html>