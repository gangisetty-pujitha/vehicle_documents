<?php
$vn = $_POST['vehicle_num'];
?>
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="style1.css">
	<title>Vehicle Details</title>
  <style>
    #box {
    padding: 100px 100px 50px 100px;
    text-align: center;
}
.owner-column {
    padding : 3% 2%;
}

  </style>
</head>
<body style="background-color:#cce6ff;">
	<?php
	// connect to the database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "vechile_documents";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// retrieve the submitted vehicle number from the previous page

	// query the database for the details and documents related to the vehicle number
	$sql = "SELECT * FROM v_docs WHERE vehicle_number = '$vn' ";
	$result = mysqli_query($conn, $sql);
  
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
	?>

    
  <section id="box">
    <div class="top-box row">
        <div class="vehicle-img col-md-10 ">
            <img src="Kamesh_sir.png" height="150px" width="200px">
        </div> 
        <div class="vehicle-no col-md-2">Vehicle No:<br> <input type="text" value='<?php echo $row['vehicle_number'] ?>'></div>
    </div>

    <div class="row">

    <div class="owner-column col-lg-4 col-md-6">
    <div class="card">
      <div class="card-header">
        <h3>Owner Details</h3>
      </div>
      <div class="card-body">
        <div class="owner-name row ">
            <div class="btn col-md-4">Name</div> 
            <div class="btn border border-dark text-dark col-md-6 mb-2 "><?php echo $row['Name'] ?></div>
        </div>
        <div class="owner-phone row">
            <div class="btn col-md-5">PhoneNo</div> 
            <div class= "border border-dark text-dark col-md-5 mb-2"><?php echo $row['Phone Number'] ?></div>
        </div>
        <div class="owner-email row">
            <div class="btn col-md-4">Email</div> 
            <div class= "border border-dark text-dark col-md-6 mt-2 mb-7"><?php echo $row['Email'] ?></div>
        </div>
        <div class="owner-address row">
            <div class="btn col-md-4">Address</div> 
            <div class= "border border-dark text-dark col-md-6 mt-3 mb-7"><?php echo $row['Address'] ?></div>
        </div>
      </div>
    </div>
  </div>

  <div class="owner-column col-lg-4 col-md-6">
    <div class="card">
      <div class="card-header">
        <h3>Vehicle Details</h3>
      </div>
      <div class="card-body">
        <div class="vehicle-make row">
            <div class="btn col-md-4">Make</div> 
            <div class= "border border-dark text-dark col-md-6 mb-2"><?php echo $row['make'] ?></div>
        </div>
        <div class="vehicle-model row">
            <div class="btn col-md-4">Model</div> 
            <div class= "border border-dark text-dark col-md-6 mt-2 mb-2"><?php echo $row['model'] ?></div>
        </div>
        <div class="vehicle-year row">
            <div class="btn col-md-4">Year</div> 
            <div class= "border border-dark text-dark col-md-6 mt-2 mb-2"><?php echo $row['year'] ?></div>
        </div>
        <div class="vehicle-date row">
            <div class="btn col-md-4">Regd. Date</div> 
            <div class= "border border-dark text-dark col-md-6 mt-3 mb-5"><?php echo $row['registration_date'] ?></div>
        </div>
      </div>
    </div>
  </div>

  <div class="owner-column col-lg-4">
    <div class="card">
      <div class="card-header">
        <h3>Official Docs</h3>
      </div>
      <div class="card-body">
		<div></div>
	  <div class="btn col-md-90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status</div>
        <!-- Insurance -->
        <div class="insurance-details row"> 
			<?php 
			$dl = mysqli_query($conn, "select location from file_uploads where type_of_doc='DLC' and vehicle_number='$vn'"); 
			$res = mysqli_fetch_assoc($dl);
			echo '<div class="btn col-md-6"><a href="'.$res["location"].'" target="_blank">Driving Licence</a></div>';
			date_default_timezone_set('Asia/Kolkata');
			$status=round(strtotime($row['ins_ed'])-strtotime(date('now')));
			if($status>0)
			{
					echo '<div class="btn btn-success col-md-3 ">Active</div>';
			}
			else
			{
				echo'<div class="btn btn-danger col-md-3">In-Active</div>';
			}
			
			?>
        </div>

        <!-- RC Book -->
        <div class="rc-details row">
			<?php
			$dl = mysqli_query($conn, "select location from file_uploads where type_of_doc='RC' and vehicle_number='$vn'"); 
			$res = mysqli_fetch_assoc($dl);
			echo '<div class="btn col-md-6"><a href="'.$res["location"].'" target="_blank">RC Book</a></div>';
            $status=round(strtotime($row['ins_ed'])-strtotime(date('now')));
			if($status>0)
			{
					echo '<div class="btn btn-success col-md-3 mt-2">Active</div>';
			}
			else
			{
				echo'<div class="btn btn-danger col-md-3 mt-2">In-Active</div>';
			}
			?>
        </div>

        <!-- Driving License -->
        <div class="license-details row">
            <?php
			$dl = mysqli_query($conn, "select location from file_uploads where type_of_doc='IC' and vehicle_number='$vn'"); 
			$res = mysqli_fetch_assoc($dl);
			echo '<div class="btn col-md-6"><a href="'.$res["location"].'" target="_blank">Insurance</a></div>';
            $status=round(strtotime($row['ins_ed'])-strtotime(date('now')));
			if($status>0)
			{
					echo '<div class="btn btn-success col-md-3 mt-2">Active</div>';
			}
			else
			{
				echo'<div class="btn btn-danger col-md-3 mt-2">In-Active</div>';
			}
			?>
        </div>

        <!-- Pollution Certificate -->
        <div class="pc-details row">
            <?php
			$dl = mysqli_query($conn, "select location from file_uploads where type_of_doc='PC' and vehicle_number='$vn'"); 
			$res = mysqli_fetch_assoc($dl);
			echo '<div class="btn col-md-6"><a href="'.$res["location"].'" target="_blank">Pollution Control</a></div>';
      date_default_timezone_set('Asia/Kolkata');
      $status=round(strtotime($row['ins_ed'])-strtotime(date("d-m-y h:i:s")));
			if($status>0)
			{
					echo '<div class="btn btn-success col-md-3 mt-2 mb-2">Active</div>';
			}
			else
			{
				echo'<div class="btn btn-danger col-md-3 mt-2 md-2">In-Active</div>';
			}
			?>
        </div>

      </div>
    </div>
  </div> 

  </div>

  </section>

  <?php }
	}
  ?>
</body>
</html>
		<!-- // display the details and documents in a table
		echo "<table>";
		//echo "<tr><th>Vehicle Number</th><th>Name</th><th>Phone Number</th><th>Email id</th><th>Make</th><th>Model</th><th>Year</th><th>Registration Date</th><th>Insurance Document</th><th>Ins_SD</th><th>Ins_ED</th><th>Registration Document</th></tr>";
		while($row = mysqli_fetch_assoc($result)) {
			echo "<tr><th>Name</th>"."<th>Make</th>" ."</th>Phone Number</th>" ."<th>Insurance</th>"."<th>Email</th></tr>";
			echo "<tr style='background-color:white;color:black;'><th>".$row['Name'] ."</th><th>" . $row['make'] ."</th><th>" . $row['Phone Number']."</th><th><a href='" . $row['insurance_document'] . " '>View Document</a></th></tr>";
			//echo "<tr><th>Make</th><tr><td>".  $row['Name'] . "</td></tr><tr><th>Model</th><tr><td>" . $row['model'] . "</td></tr><tr><th>Year of Registration</th><tr><td>" . $row['year'] . "</td></tr><tr><th>Registration Date</th><tr><td>" . $row['registration_date'] . "</td></tr>";
			//echo "<tr><th>Insurance</th><tr><td><a href='" . $row['insurance_document'] . " '>View Document</a></td></tr><tr><th>Insurance Issued</th><tr><td>". $row['ins_sd']."</td></tr><tr><th>Insurance Validity</th><tr><td>" . $row['ins_ed']."</td></tr><tr><th>Regd Document</th><tr><td><a href='" . $row['registration_document'] . "'>View Document</a></td></tr>";
		}
		echo "</table>";
	} else {
		echo "No records found for vehicle number: " . $vehicle_number;
	}

	// close the database connection
	mysqli_close($conn);
	?>
</body>
</html> -->