<?php 

	session_start();
function email_validation($str) { 
	return (!preg_match( 
"^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $str)) 
		? FALSE : TRUE; 
} 
	// variable declaration
	 $username = "";
	 $email    = "";
	 $dob="";
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
		if (!email_validation($email)){
    //   $emailErr = "Invalid email format"; 
      array_push($errors, "Invalid Email format");
    }
    $d = strtotime("+5hours 30minutes");
    $currentdate=date("Y-m-d",$d);
        if($dob > $currentdate){
        array_push($errors, "DOB cannot be greater than Current Date");
    }
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			
			$query = "INSERT INTO user(username,dob, email, password) 
					  VALUES('$username', '$dob','$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['email'] = $email;
			header('location: home.php');
		}

	}

	// ... 

	// LOGIN USER
		if (isset($_POST['signup'])) {
			$username = mysqli_real_escape_string($db, $_POST['username']);
		$dob = mysqli_real_escape_string($db, $_POST['dob']);
// 		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$password2 = mysqli_real_escape_string($db, $_POST['password2']);
	$db = mysqli_connect('localhost', 'id12999702_pritam', 'rise123', 'id12999702_online')
	or die("Sorry!It cannot connect to mysql database");
		if ($password != $password2) {
			array_push($errors, "The two passwords do not match");
		}
    $d = strtotime("+5hours 30minutes");
    $currentdate=date("Y-m-d",$d);
    if($dob > $currentdate){
        array_push($errors, "DOB cannot be greater than Current Date");
    }
	   $result="SELECT * FROM user WHERE password='$password' AND dob='$dob'";
	   $res=mysqli_query($db, $result);
		$row =mysqli_fetch_array($res);
		 $username=$row['username'];  
if (count($errors) == 0 AND $username== $_POST['username']) {
     		    $eid=$row['eid'];     
     		    $dob=$row['dob'];
				$_SESSION['username'] = $username;
				$_SESSION['eid'] = $eid;
				$_SESSION['dob']= $dob;
				header('location: home.php');
		}
		}





?>

