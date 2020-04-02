<?php include('index1.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/home.css">
</head>

<body>

<div class="container">
  <h2>Online Exam</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home"><span class="glyphicon glyphicon-home"></span> Home</a></li>
    <li><a data-toggle="tab" href="#menu1">Profile</a></li>
    <li><a data-toggle="tab" href="#menu2">History</a></li>
      <?php
 include_once 'index1.php';
if(!(isset($_SESSION['username']))){
header("location:user.php");

}
else
{
$name =$_SESSION['username'];

$qry=mysqli_query($db,"SELECT eid,dob from user where username='$name' ") or die("Sorry!cannot query with database");
while($row = mysqli_fetch_array($qry)) {
  $eid=$row['eid'];
}
include_once 'index1.php';
echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="login1.php?q=1" class="log log1">'.$name.'</a>&nbsp;|&nbsp;<a href="../index.html" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
}?>
  </ul>

   <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>HOME</h3>

<!-- <p id="demo"></p> -->
<?php 
$result = mysqli_query($db,"SELECT * FROM quiz ") or die('Error');
while($row = mysqli_fetch_array($result)) {
  $qid=$row['qid'];
  $name = $row['name'];
  $total = $row['total'];
  $sahi = $row['sahi'];
    $time = $row['time']/60;
    ?>
  <div id="quizdiv"><?php echo $name; ?><br> Time Limit:<?php echo $time; ?><br>Total:<?php echo $sahi*$total; ?>
   <form action="guide1.php" method='POST' style="display: inline;"> 
<input type='hidden' id='qid' name='qid' value="<?php echo $qid;?>" />
<input type='hidden' id='name' name='name' value="<?php echo $name;?>" />
<input type='hidden' id='total' name='total' value="<?php echo $total;?>" />
<input type='hidden' id='sahi' name='sahi' value="<?php echo $sahi;?>" />
<input type='hidden' id='time' name='time' value="<?php echo $time;?>" />
    <input type="submit" value="submit" name="submit7"class="btn btn-primary" id="button" />
   </form> 
</div>
<?php 
}
?>


 </div>
 
<div id="menu1" class="tab-pane fade">
      <h3>Profile</h3>
      <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Enrollment Number</th>
        <th>Name</th>
        <th>Date of Birth</th>
         <th>Email</th>
      </tr>
    </thead>
    <tbody>
     <?php
    
 include_once 'index1.php';
if((isset($_SESSION['username']))){
$name=$_SESSION['username'];
$dob =$_SESSION['dob'];
	$db = mysqli_connect('localhost', 'id12999702_pritam', 'rise123', 'id12999702_online')
  or die("Sorry!It cannot connect to mysql database");
$q = mysqli_query($db,"SELECT * FROM user where username='$name' AND dob='$dob'") or die('Error');
while($row=mysqli_fetch_array($q) )
{
  $eid=$row['eid'];
  $name = $row['username'];
  $dob = $row['dob'];
  $email = $row['email'];
  echo '<tr><td>'.$eid.'</td><td>'.$name.'</td><td>'.$dob.'</td><td>'.$email.'</td></tr>';
}
}
  ?>
    </tbody>
  </table>
</div>



 <div id="menu2" class="tab-pane fade">
      <h3>Profile</h3>
      <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Qid</th>
        <th>Name</th>
        <th>Total</th>
         <th>Time</th>
          <th>Right</th>
           <th>Score</th>
      </tr>
    </thead>
    <tbody>
     <?php
 include_once 'index1.php';
if((isset($_SESSION['username']))){
$name=$_SESSION['username'];
	$db = mysqli_connect('localhost', 'id12999702_pritam', 'rise123', 'id12999702_online')
  or die("Sorry!It cannot connect to mysql database");
  $q = mysqli_query($db,"SELECT * FROM user where username='$name' ") or die('Error');
while($row=mysqli_fetch_array($q) )
{
  $eid=$row['eid'];
  $_SESSION['eid']=$eid;
$q=mysqli_query($db,"SELECT * FROM history where eid='$eid'" )  or die("Failed".mysql_error());
while($row=mysqli_fetch_array($q) )
{
  $qid=$row['qid'];
  $name = $row['name'];
  $total = $row['total'];
  $sahi = $row['sahi'];
  $time = $row['time'];
  $score = $row['score'];

  echo '<tr><td>'.$qid.'</td><td>'.$name.'</td><td>'.$total.'</td><td>'.$time.'</td><td>'.$sahi.'</td><td>'.$score.'</td></tr>';
}
}
}
  ?>
    </tbody>
  </table>
</div>
     
</div>
</body>
</html>
