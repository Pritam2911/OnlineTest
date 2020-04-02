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
mysql_connect('localhost', 'id12999702_root', 'root123');
mysql_select_db("id12999702_online");

$r=0;
$w=0;
$i=1;
$n=0;
$score=0;
$per=0;
 if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) {
 	$qid=@$_GET['qid'];
 	$qn=@$_GET['qn'];
 	$eid=@$_GET['eid'];
 	$total=@$_GET['t'];
 	if(isset($_POST['submit'])){
	if(!empty($_POST['quizcheck'])){
		$count=count($_POST['quizcheck']);
		$selected=$_POST['quizcheck'];
		foreach($selected as $ky=>$vl){
$db = mysqli_connect('localhost', 'id12999702_root', 'root123', 'id12999702_online')
  or die("Sorry!It cannot connect to mysql database");
$query = "INSERT INTO checking(eid,qid, qn, quizcheck) 
            VALUES('$eid','$qid', '$ky', '$vl')";
      mysqli_query($db, $query); 
  }
	$q=mysql_query("SELECT * FROM questions where qid='$qid'  " )  or die("Failed".mysql_error());
while($row=mysql_fetch_array($q) )
{
	$ans_id=$row['ans_id'];
if($row['ans_id']==$selected[$i]){
	$r++;
}
elseif(!$selected[$i]){
	$n++;
}
else{
	$w++;
}
  $i++;
}
$score=$score+$r-$w;
$per=($score/$total)*100;
	$q5=mysql_query("SELECT * FROM quiz where qid='$qid'  " )  or die("Failed".mysql_error());
while($row=mysql_fetch_array($q5) )
{
	$name=$row['name'];
}
?>
<h3 style="text-align: center; color: red">Your Result for <br/>Qid: <?php echo $qid?><br/>Name: <?php echo $name?></h3>
<div class="container">
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
$db = mysqli_connect('localhost', 'id12999702_root', 'root123', 'id12999702_online')
  or die("Sorry!It cannot connect to mysql database");
$result = mysqli_query($db,"SELECT * FROM quiz where qid='$qid' ") or die('Error');
while($row=mysqli_fetch_array($result) )
{
      $name=$row['name'];
      $total=$row['total'];
      $sahi=$row['sahi'];
      $time=$row['time'];
}
$db = mysqli_connect('localhost', 'id12999702_root', 'root123', 'id12999702_online')
  or die("Sorry!It cannot connect to mysql database");
$query = "INSERT INTO history(eid,qid,name,total,time,sahi,score) 
					  VALUES('$eid','$qid', '$name','$total', '$time','$sahi','$score')";
			mysqli_query($db, $query);
}

}
else
{
	if(empty($_POST['quizcheck'])){
		$count=count($_POST['quizcheck']);
		$selected=$_POST['quizcheck'];
	$q=mysql_query("SELECT * FROM questions where qid='$qid'  " )  or die("Failed".mysql_error());
while($row=mysql_fetch_array($q) )
{
	$ans_id=$row['ans_id'];
if($row['ans_id']==$selected[$i]){
	$r++;
}
elseif(!$selected[$i]){
	$n++;
}
else{
	$w++;
}
  $i++;
}
$score=$score+$r-$w;
$per=($score/$total)*100;
	$q5=mysql_query("SELECT * FROM quiz where qid='$qid'  " )  or die("Failed".mysql_error());
while($row=mysql_fetch_array($q5) )
{
	$name=$row['name'];
}
?>
<h3 style="text-align: center; color: red">Your Result for <br/>Qid: <?php echo $qid?><br/>Name: <?php echo $name?></h3>
<div class="container">
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
      	<td><?php echo "<b><br/>You ran out of time. Better Luck next time!";?></td>
      </tr>
    </tbody>
  </table>
</div>

<?php
$db = mysqli_connect('localhost', 'id12999702_root', 'root123', 'id12999702_online')
  or die("Sorry!It cannot connect to mysql database");
$result = mysqli_query($db,"SELECT * FROM quiz where qid='$qid' ") or die('Error');
while($row=mysqli_fetch_array($result) )
{
      $name=$row['name'];
      $total=$row['total'];
      $sahi=$row['sahi'];
      $time=$row['time']/60;
}
$db = mysqli_connect('localhost', 'root', '', 'online')
  or die("Sorry!It cannot connect to mysql database");
$query = "INSERT INTO history(eid,qid,name,total,time,sahi,score) 
					  VALUES('$eid','$qid', '$name','$total', '$time','$sahi','$score')";
			mysqli_query($db, $query);
}

}
echo'<br/><a href="home.php"><p id="button"><input type="submit" class="btn btn-primary" name="Next" value="Next" ></p></a>';
}
?>

 </body>
 </html>


