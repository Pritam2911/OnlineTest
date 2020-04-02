<?php 

	session_start();

	// variable declaration
	 $username = "";
	 $email    = "";
	 $dob="";
	 $emailErr="";
	 $errors = array(); 
	

	// connect to database
	$db = mysqli_connect('localhost', 'id12999702_pritam', 'rise123', 'id12999702_online')
	or die("Sorry!It cannot connect to mysql database");

	// REGISTER USER
	if (isset($_POST['register'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
	    $dob = mysqli_real_escape_string($db, $_POST['dob']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$password2 = mysqli_real_escape_string($db, $_POST['password2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($dob)) { array_push($errors, "DOB is required"); }
		if (empty($password)) { array_push($errors, "Password is required"); }

		if ($password != $password2) {
			array_push($errors, "The two passwords do not match");
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			
			$query = "INSERT INTO admin(username,dob, email, password) 
					  VALUES('$username', '$dob','$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['message'] = "You are now logged in";
			header('location: home1.php');
		}

	}

	// ... 

	// LOGIN USER
		if (isset($_POST['signup'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$dob = mysqli_real_escape_string($db, $_POST['dob']);

		$password = mysqli_real_escape_string($db, $_POST['password']);
		$password2 = mysqli_real_escape_string($db, $_POST['password2']);
	$db = mysqli_connect('localhost', 'id12999702_pritam', 'rise123', 'id12999702_online')
		or die("Sorry!It cannot connect to mysql database");
		if ($password != $password2) {
			array_push($errors, "The two passwords do not match");
		}
		
	   $result="SELECT * FROM admin WHERE password='$password' AND dob='$dob'"
                  or die("Failed".mysql_error());
        $re=mysqli_query($db,$result);
		$row =mysqli_fetch_array($re);
        $username=$row['username'];    
		if (count($errors) == 0 AND $username==$_POST['username']) {
       
				$_SESSION['username'] = $username;
				$_SESSION['message'] = "You are now logged in";
				header('location: home1.php');
		}
		}

//add quiz
 $qid="";
$name="";
$total="";
$sahi="";
$wrong="";
$time="";
	$db = mysqli_connect('localhost', 'id12999702_pritam', 'rise123', 'id12999702_online')
  or die("Sorry!It cannot connect to mysql database");
if (isset($_POST['submit3'])) {
$qry=mysqli_query($db,"insert into quiz values('".$_POST["qid"]."','".$_POST["name"]."','".$_POST["total"]."','".$_POST["right"]."','".$_POST["wrong"]."','".$_POST["time"]."')") or die("Sorry!cannot query with database");
header('location: home1.php');
}






?>

