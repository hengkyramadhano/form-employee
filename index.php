<!DOCTYPE html>
<html>
<head>
	<title>Employee</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <script src="js/jquery-3.3.1.js"></script>
	<script>
		$(document).ready(function(){
			$('#provinsi').change(function(){
				var provinsi_id = $(this).val();

				$.ajax({
					type: 'POST',
					url: 'kota.php',
					data: 'prov_id='+provinsi_id,
					success: function(response){
						$('#kota').html(response);
					}
				});
			})
		});
	</script> -->
	<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.row {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}

.jarak{
	text-align: left;
    padding: 16px;
}

.zebra:nth-child(even) {
    background-color: #f2f2f2;
}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #0c69ff;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 35px;
  right: 35px;
  width: 175px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0px;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 600px;
  padding: 30px;
  background-color: white;
}

/* Full-width input zebras */
.form-container input[type=text], .form-container input[type=email], .form-container input[type=date], .form-container input[type=Number],  .form-container select[name="jabatan"],
.form-container input[type=Address], .form-container select[name="rekBank"], .form-container select[name="provinsi"], .form-container select[name="kota"] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=email]:focus, 
.form-container input[type=date]:focus, .form-container input[type=Number]:focus, .form-container input[type=Address]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #0c69ff;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100px;
  margin-bottom:10px;
  margin-left: 10px;
  margin-right: 10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}

li {
    float: left;
 }


#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>
</head>
<body>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employees";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$result = mysqli_query($conn, 'SELECT * FROM employee');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
?>

<table class = "row">
	<tr class = "zebra">
		
		<th class='jarak'>Name</th>
		<th class='jarak'>Phone</th>
		<th class='jarak'>Born</th>
		<th class='jarak'>Address</th>
		<th class='jarak'>Current Position</th>
		<th class='jarak'>KTP file</th>
		<th class='jarak'>Action</th>

	</tr>
	<?php
	while ($row=mysqli_fetch_array($result))
	{
	   echo "<tr class = 'zebra'>";
	   echo "<td class='jarak'>".$row['naDep']."</td>";
	   echo "<td class='jarak'>".$row['telpon']."</td>";
	   echo "<td class='jarak'>".$row['dob']."</td>"; 
	   echo "<td class='jarak'>".$row['jalan']."</td>";
	   echo "<td class='jarak'>".$row['jabatan']."</td>";
	   echo "<td class='jarak'>
	   		<button><img id='myImg' src=".$row['path']." alt='KTP' style='width:40px; height:20px'></img></button>

			<div id='myModal' class='modal'>
			  <span class='close'>&times;</span>
			  <img class='modal-content' id='img01'>
			  <div id='caption'></div>
			</div>
		   </td>";
	   echo "</tr>";
	}
	?>
</table>

<button class="open-button" onclick="openForm()">Add New Employee</button>

<div class="form-popup" id="myForm" style="overflow: auto;">
  <form action="create_data.php" method="POST" enctype="multipart/form-data" class="form-container">
    <h1>New Employee</h1>
    <table>
    	<tr>
    		<td><label for="naDep"><b>Name<div style="color:#F00";>*</div></b></label></td>
    		<td><input type="text" placeholder="Enter First Name" name="naDep" required></td>
    		<td><input type="text" placeholder="Enter Last Name" name="naBel" required></td>
    	</tr>
    	<tr>
    		<td><label for="dob"><b>Date of Birth</b></label></td>
    		<td><input type="date" placeholder="Choose date" name="dob"></td>
    	</tr>
    	<tr>
    		<td><label for="telepon"><b>Phone Number</b></label></td>
    		<td><input type="Number" placeholder="ex: 0853..." name="telepon" required></td>
    	</tr>
    	<tr>
    		<td><label for="email"><b>E-Mail</b></label></td></td>
    		<td><input type="email" placeholder="Take your email address" name="email"></td>
    	</tr>
    	<tr>
    		<td><label for="provinsi"><b>Province & City</b></label></td>
    		<?php
    		$sql_provinsi = mysqli_query($conn, 'SELECT * FROM provinsi');
    		?>
    		<td>
			  	<select name="provinsi" id="provinsi">
			    	<option value="">Choose Province</option>
			    	<?php 
			    	while ($row_provinsi = mysqli_fetch_array($sql_provinsi)) {
			    	?>
			    	<option value="<?php echo $row_provinsi['nama_prov'] ?>">
			    		<?php 
			    		echo $row_provinsi['nama_prov']; ?>
			    	</option>
			    <?php } ?>
			  	</select><br />
			</td>
    		<?php
    		$sql_kota = mysqli_query($conn, 'SELECT * FROM kota');
    		?>
    		<td><select name="kota" id="kota">
    			<option value="">Choose City</option>
    			<?php 
			    	while ($row_kota = mysqli_fetch_array($sql_kota)) {
			    	?>
    			<option value="<?php echo $row_kota['nama_kota'] ?>">
			    		<?php echo $row_kota['nama_kota']; ?>
			    	</option>
			    	<?php } ?>
    		</select></td>
    	</tr>
    	<tr>
    		<td><label for="jalan"><b>Address</b></label></td>
    		<td><input type="Address" placeholder="Address" name="jalan"></td>
    		<td><input type="text" placeholder="Postcode" name="kdPos"></td>
    	</tr>
    	<tr>
    		<td><label for="noKtp"><b>No. KTP</b></label></td>
    		<td><input type="text" placeholder="(Kartu Tanda Penduduk)" name="noKtp" required></td>
    	</tr>
    	<tr>
    		<td><label for="jabatan"><b>Current Position</b></label></td>
    		<td>
			  	<select name="jabatan">
			  		<option value="">Choose Current Position</option>
			    	<option value="ceo">CEO</option>
			    	<option value="cto">CTO</option>
			    	<option value="cfo">CFO</option>
			  	</select>
			</td>
    	</tr>
    	<tr>
    		<td><label for="rekBank"><b>Bank Account</b></label></td>
    		<td>
			  	<select name="rekBank">
			  		<option value="">Choose Account Bank</option>
			    	<option value="bca">BCA</option>
			    	<option value="bni">BNI</option>
			    	<option value="bri">BRI</option>
			    	<option value="mandiri">Mandiri</option>
			  	</select>
			</td>
    	</tr>
    	<tr>
    		<td><label for="noRek"><b>Account Number</b></label></td>
    		<td><input type="text" placeholder="" name="noRek"></td>
    	</tr>	
    	<tr>
			<td><label><b>Attach KTP</b></label></td>
			<td><label><input type="file" name="img" required/></label></td>
		</tr>
		</table>
	    <ul align="center" style="list-style-type:none; ">
	    	<li><td><button type="submit" name="save_btn" class="btn">Submit</button></td></li>
	    	<li><td><button type="button" class="btn cancel" onclick="closeForm()">Close</button></td></li>
	    </ul>
    </form>
</div>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}

function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}
</script>
</body>
</html>