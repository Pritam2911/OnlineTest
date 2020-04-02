<?php include('index.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="../css/home.css">
</head>

<body>
<!-- <div class="loader">
    <img src="../images/loading.gif" alt="Loading..." />
</div> -->
<div class="container">
  <h2>Online Exam</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home"><span class="glyphicon glyphicon-home"></span> Home</a></li>
    <!--<li><a data-toggle="tab" href="#menu1">Profile</a></li>-->
    <li><a data-toggle="tab" href="#menu2">Quiz</a></li>
    <li><a data-toggle="tab" href="#menu3">Add question</a></li>
      <?php
 include_once 'index.php';
if(!(isset($_SESSION['username']))){
header("location:admin.php");

}
else
{
$name =$_SESSION['username'];
include_once 'index.php';
echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="admin.php?q=1" class="log log1">'.$name.'</a>&nbsp;|&nbsp;<a href="../index.html" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
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
   <form action="guide.php" method='POST' style="display: inline;"> 
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
 
<div id="menu2" class="tab-pane fade">
      <h3><center> Enter Quiz Details</center></h3>

    <div class="container">
  <form method="post" action="index.php">
     <div class="col-xs-2">
  <label for="ex1">Enter Quiz Id</label>
  <input class="form-control" id="ex1" type="number" name="qid" >
    </div><br/><br/><br/><br/>
    <div class="form-group">
      <label for="inputdefault">Enter Quiz Title</label>
      <input class="form-control" id="inputdefault" type="text"  name="name">
    </div>
    <div class="form-group">
      <label for="inputsm">Enter total number of questions</label>
      <input class="form-control input-sm" id="inputsm" type="text" name="total">
    </div>
    <div class="form-group">
      <label for="inputsm">Enter marks on right answer</label>
      <input class="form-control input-sm" id="inputsm" type="text"  name="right">
    </div>
    <div class="form-group">
      <label for="inputsm">Enter negative marks</label>
      <input class="form-control input-sm" id="inputsm" type="text"  name="wrong">
    </div>
    <div class="form-group">
      <label for="inputsm">Enter time limit for test </label>
      <input class="form-control input-sm" id="inputsm" type="text"  name="time">
    </div>
    <button type="submit" class="btn btn-default" name="submit3" value="submit3">Submit</button>
  </form>
</div>
</div>

<div id="menu3" class="tab-pane fade">
      <h3><center> Enter Question Details</center></h3>
<?php
$id="";
$text="";
$qid="";
$ans_id="";

	$db = mysqli_connect('localhost', 'id12999702_pritam', 'rise123', 'id12999702_online')
  or die("Sorry!It cannot connect to mysql database");
if (isset($_POST['submit1'])) {
$qry=mysqli_query($db,"insert into questions values('".$_POST["qid"]."','','".$_POST["text"]."','".$_POST["answers"]."','".$_POST["answers1"]."','".$_POST["answers2"]."','".$_POST["answers3"]."','".$_POST["ans_id"]."')") or die("Sorry!cannot query with database");
//header('location: home1.php');

}
?>
    <div class="container">
  <form method="post" action="home1.php">
     <div class="col-xs-2">
  <label for="ex1">Enter Quiz Id</label>
  <input class="form-control" id="ex1" type="number" name="qid" >
    </div><br/><br/><br/><br/>
     
    <div class="form-group">
      <label for="inputdefault">Enter Question Text</label>
      <input class="form-control" id="inputdefault" type="text"  name="text">
    </div>
    <div class="form-group">
      <label for="inputsm">Option Number#1</label>
      <input class="form-control input-sm" id="inputsm" type="text" name="answers">
    </div>

    <div class="form-group">
      <label for="inputsm">Option Number#2</label>
      <input class="form-control input-sm" id="inputsm" type="text"  name="answers1">
    </div>


    <div class="form-group">
      <label for="inputsm">Option Number#3</label>
      <input class="form-control input-sm" id="inputsm" type="text"  name="answers2">
    </div>


    <div class="form-group">
      <label for="inputsm">Option Number#4 </label>
      <input class="form-control input-sm" id="inputsm" type="text"  name="answers3">
    </div>
<div class="col-xs-2">
  <label for="ex1">Correct Choice Number</label>
  <input class="form-control" id="ex1" type="text"  name="ans_id">
    </div>
<br/><br/><br/><br/>
    <button type="submit" class="btn btn-default" name="submit1" value="submit1">Submit</button>
  </form>
</div>
</div>

<!--  --><script>
var qid1= <?php echo $qid ?>;
function openwindow() {
document.getElementById("demo").innerHTML =qid1;
  // var myWindow = window.open("a.php?qid="+qid1, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,width=1200,height=650");

}
</script>
</body>
</html>
