<?php
    require_once('include/lib.php');
    $table = "criminal";
    $flag = 1;
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
   
       
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>CRIMINAL DATA </title>
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
	 <th>FINGERPRINT </th>
         <th> F_NAME</th>
         <th>S_NAME </th>
         <th>DOB</th>
         <th> STREET </th>
         <th>CITY</th>
         <th>TYPE OF CRIME</th>
       

	</tr>

        </thead>
        <tbody>
	<?php
    $i = 0;
		while (!empty($result[$i]['fingerprint'])) {
             echo '<tr> <td>'.$result[$i]['fingerprint']. '<td>'.$result[$i]['f_name']. '</td> '. '<td>'.$result[$i]['s_name']. '</td> '. '<td>'.$result[$i]['dob']. '</td> '. '<td>'.$result[$i]['street']. '</td> '.'<td>'.$result[$i]['city']. '</td> '.  '<td>'.$result[$i]['typeofcrime']. '</td> </tr>';
		   
            $i++;
		     
		}
	?>
           
        </tbody>
    </table>
</div>

</div>

</body>
</html>
