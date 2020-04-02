<?php 
 include_once 'index1.php';
 if(!(isset($_SESSION['username']))){
header("location:admin.php");

}
else{
?>
<!DOCTYPE html>
<html>
<head>
    <title>Guidelines</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<h2 style="text-align: center; color: red">Important Instructions & Guidelines</h2>  
<br/>
<h3 style="text-align: center; color: blue">ALL THE BEST!!</h3>                    
  <table class="table table-hover">
    <tbody>
      <tr>
        <td> 1. Do not use Mobile phones or any other Electronic Gadgets while giving the Test </td>
      </tr>
      <tr>
        <td> 2. You have to attempt all questions.</td>
      </tr>
      <tr>
        <td> 3. Dont close the window before submission and log out</td>
      </tr>
          <tr>
        <td> 4. Make sure you have a proper internet connection and latest version Chrome Browser</td>
      </tr>
          <tr>
        <td> 5. If your computer is taking unexpected time to load, recommend to reboot the system before you start the test.</td>
      </tr>
          <tr>
        <td> 6. If your computer system shuts down suddenly due to power supply being disconnected, you can resume the test from the same question that you were attempting earlier. All your previous answers are already saved.</td>
      </tr>
          <tr>
        <td> 7. Once you start the test, recommend to pursue it in one go for the complete duration.</td>
      </tr>
    </tbody>
  </table>
</div>
	 <p style="text-align: center"><input type="checkbox" name="prog" value="1"> I agree</p>
	 <br>
 <?php 

$_SESSION['qid']=$_POST['qid'];
$_SESSION['name']=$_POST['name'];
$_SESSION['total']=$_POST['total'];
$_SESSION['sahi']=$_POST['sahi'];
echo $_SESSION['qid'];
 ?>
  <form action="quiz2.php" method='POST' style="display: inline;"> 
<input type='hidden' id='qid' name='qid' value="<?php echo $_POST['qid'];?>" />
<input type='hidden' id='name' name='name' value="<?php echo $_POST['name'];?>" />
<input type='hidden' id='total' name='total' value="<?php echo $_POST['total'];?>" />
<input type='hidden' id='sahi' name='sahi' value="<?php echo $_POST['sahi'];?>" />

  <p style="text-align: center"><input type="submit" id="submit_prog" class="btn btn-primary" value='Submit' /></p>
  </form>
<script>
      $(document).ready(function() {
    
        var $submit = $("#submit_prog").hide(),
            $cbs = $('input[name="prog"]').click(function() {
                $submit.toggle( $cbs.is(":checked") );
            });
    
    });
</script>
</body>
</html>
<?php } ?>