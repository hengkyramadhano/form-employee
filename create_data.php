<?php

if (isset($_POST['naDep']) && isset($_POST['naBel']) && isset($_POST['dob']) && isset($_POST['telepon']) && isset($_POST['email']) && isset($_POST['provinsi']) && isset($_POST['kota']) && isset($_POST['jalan']) && isset($_POST['kdPos']) && isset($_POST['noKtp']) && isset($_POST['posisi']) && isset($_POST['rekBank']) && isset($_POST['noRek']) ) { 
    $naDep = $_POST['naDep'];
    $naBel = $_POST['naBel'];
    $dob = $_POST['dob'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $jalan = $_POST['jalan'];
    $kdPos = $_POST['kdPos'];
    $noKtp = $_POST['noKtp'];
    $posisi = $_POST['posisi'];
    $rekBank = $_POST['rekBank'];
    $noRek = $_POST['noRek'];
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employees";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['save_btn']))
	{
		// if($con = mysqli_connect("localhost","root","","uploadfile"))
		// {
			$filetemp = $_FILES['img']['tmp_name'];
			$filename = $_FILES['img']['name'];
			// $filetype = $_FILES['img']['type'];
			$filepath = "pics/".$filename;

			move_uploaded_file($filetemp, $filepath);

			$query = mysqli_query($conn,"call imageInsert('$naDep', '$naBel', '$dob', '$telepon', '$email', '$provinsi', '$kota', '$jalan', '$kdPos', '$noKtp', '$posisi', '$rekBank', '$noRek', '$filename', '$filepath')");
			if($query)
			{
				echo "<script language='javascript'> 
				document.location.href = '../developer-test/index.php'; 
				</script>";
			}
			else
			{
				echo "Insertion Database Failed!!!";
			}
		// }
	}


// $sql = "INSERT INTO employee (naDep, naBel, dob, telpon, email, provinsi, kota, jalan, kdPos, noKtp, rekBank, noRek) VALUES ('$naDep', '$naBel', '$dob', '$telepon', '$email', '$provinsi', '$kota', '$jalan', '$kdPos', '$noKtp', '$rekBank', '$noRek')";

// if (mysqli_query($conn, $sql)) {
//    //  echo "New record created successfully";
//     echo "<script language='javascript'> 
// 			document.location.href = '../developer-test/index.php'; 
// 			</script>";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

mysqli_close($conn);
?>