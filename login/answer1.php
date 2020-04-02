<?php 
 include_once 'index1.php';
 if(!(isset($_SESSION['username']))){
header("location:user.php");

}
else{
?>
<!DOCTYPE html>
<html>
<head>
  <title>Result</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
#button{
  width: 150px;
  text-align: center;
 }
  </style>
</head>
 <body>
<h2 style="text-align: center;color: blue">Thank You for giving the exam</h2>
 <?php 
 // ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
	$db = mysqli_connect('localhost', 'id12999702_pritam', 'rise123', 'id12999702_online')
	or die("Sorry!It cannot connect to mysql database");

$_SESSION['qid'];
$_SESSION['name'];
$_SESSION['sahi'];
$qid=$_SESSION['qid'];
$total=$_SESSION['total'];

 	if(isset($_POST['1'])){
	   $keys=array_keys($_POST);
   $order=join(",",$keys);
    $response = "SELECT * FROM questions WHERE id IN ($order) ORDER BY FIELD(id,$order)";
         $res=mysqli_query($db, $response);
       $rows = mysqli_num_rows($res);
          $r=0;
    $w=0;
    $n=0;
    $score=0;
    $per=0;
   while( $result1 = mysqli_fetch_assoc( $res ) ){
       if( $result1['ans_id']==$_POST[$result1['id']] ){
	$r++;
}
else if($_POST[$result1['id']]== 5 ){
	$n++;
}
else{
	$w++;
}
}
$count=$rows-$n;
$score=$score+$r-$w;
$per=($score/$rows)*100;
if($score<=0){
	$per=0;
}
	$q5="SELECT * FROM quiz where qid='$qid'  " ;
	$res1=mysqli_query($db, $q5);
while($row=mysqli_fetch_array($res1) )
{
	$name=$row['name'];
}
?>
<h3 style="text-align: center; color: red">Your Result for <br/>Name: <?php echo $name?></h3>
<div class="container">
  <?php               
   if($n==$total){
echo "<b>You haven't selected any answers! Select the answers";
   } ?>
   <br/>
<table class="table table-hover">
    <thead>
      <tr>

      </tr>
    </thead>
    <tbody>
      <tr>
        <td><b>Total Number of Questions:</td>
        <td><b><?php echo $rows;?></td>
      </tr>
      <tr>
        <td><b>Total Attempted Questions:</td>
        <td><b><?php echo $count;?></td>
      </tr>
      <tr>
        <td><b>Right Answers:</td>
        <td><b><?php echo $r;?></td>
      </tr>
       <tr>
        <td><b>Wrong Answers:</td>
        <td><b><?php echo $w;?></td>
      </tr>
       <tr>
        <td><b>Not Selected:</td>
        <td><b><?php echo $n;?></td>
      </tr>
       <tr>
        <td><b>Score:</td>
        <td><b><?php echo $score;?></td>
      </tr>
       <tr>
        <td><b>Percentage:</td>
        <td><b><?php echo $per;?></td>
      </tr>
      <tr>
      	<td><?php 
if($per<=0){
	echo"<br/><b>You need to work hard";
}
elseif($per<=50 && $per>0){
	echo"<br/><b>You need to training";
}
else{
	echo "<br/><b>You scored well";
}
?></td>
      </tr>
    </tbody>
  </table>
</div>


<?php
	$db = mysqli_connect('localhost', 'id12999702_pritam', 'rise123', 'id12999702_online')
  or die("Sorry!It cannot connect to mysql database");
$result = mysqli_query($db,"SELECT * FROM quiz where qid='$qid' ") or die('Error');
while($row=mysqli_fetch_array($result) )
{
      $name=$row['name'];
      $total=$row['total'];
      $sahi=$row['sahi'];
      $time=$row['time']/60;
}
	$db = mysqli_connect('localhost', 'id12999702_pritam', 'rise123', 'id12999702_online')
  or die("Sorry!It cannot connect to mysql database");
  $eid=$_SESSION['eid'];
$query = "INSERT INTO history(eid,qid,name,total,time,sahi,score) 
					  VALUES('$eid','$qid', '$name','$total', '$time','$sahi','$score')";
			mysqli_query($db, $query);
}

echo'<br/><a href="home.php"><p id="button"><input type="submit" class="btn btn-primary" name="Next" value="Next" ></p></a>';
}

?>

 </body>
 </html>


