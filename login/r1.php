<?php 
 include_once 'index.php';
 if(!(isset($_SESSION['username']))){
header("location:admin.php");

}
else{
?>

<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
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
<h2 style="text-align: center;color: blue">Thank You</h2>

 <?php 
 ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
$db = mysqli_connect('localhost', 'id12999702_pritam', 'rise123', 'id12999702_online')
	or die("Sorry!It cannot connect to mysql database");
$qid=$_SESSION['qid'];
$total=$_SESSION['total'];
 if(!isset($_POST['1'])) {

    $response = "SELECT * FROM questions q INNER JOIN checking1 c where q.qid='$qid' and q.id=c.qn";
         $res=mysqli_query($db, $response);
       $rows = mysqli_num_rows($res);
      
    $r=0;
    $w=0;
    $n=0;
    $score=0;
    $per=0;
   while( $row = mysqli_fetch_array( $res ) ){
      $qansid=$row['ans_id'];
      $cqn=$row['quizcheck'];
 if( $qansid==$cqn ){
  $r++;
}
else if($qansid!=$cqn ){
  $w++;
}

}
$count=$rows-$n;
$score=$score+$r-$w;
$per=($score/$rows)*100;
$n=$total-$count;
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
        <td><b><?php echo $total;?></td>
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
 
$query = "INSERT INTO history1(qid,name,total,time,sahi,score) 
					  VALUES('$qid', '$name','$total', '$time','$sahi','$score')";
			mysqli_query($db, $query);


echo'<br/><a href="home1.php"><p id="button"><input type="submit" class="btn btn-primary" name="Next" value="Next" ></p></a>';
}
?>

 </body>
 </html>
<?php } ?>

