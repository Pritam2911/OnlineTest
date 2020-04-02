<?php 
 include_once 'index1.php';
 if(!(isset($_SESSION['username']))){
header("location:user.php");

}
else{
?>
<html>
<head>
  <title>Online Exam</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
   <style>
			.container {
				margin-top: 110px;
			}
			.error {
				color: #B94A48;
			}
			.form-horizontal {
				margin-bottom: 0px;
			}
			.hide{display: none;}


    #bodydiv{
      -webkit-touch-callout: none; /* iOS Safari */
    -webkit-user-select: none; /* Safari */
     -khtml-user-select: none; /* Konqueror HTML */
       -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
            user-select: none; /* Non-prefixed version, currently
                                  supported by Chrome and Opera */
    }
    .no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(../images/loading.gif) center no-repeat #fff;
}
        
    
   </style>
</head>
<body onload="secondPassed()" id="bodydiv">
<link rel="stylesheet" href="../css/register2.css" type="text/css">
<div class="body-content">
  <div class="module">
    <div onselectstart="return false;">
  <h1 style="color:red">Exam</h1>
<span id="countdown" class="timer"></span>

<?php
$_SESSION['qid']=$_POST['qid'];
$_SESSION['name']=$_POST['name'];
$_SESSION['total']=$_POST['total'];
$_SESSION['sahi']=$_POST['sahi'];
$qid=$_POST['qid'];
$name=$_POST['name'];
$total=$_POST['total'];
$sahi=$_POST['sahi'];

?>
  <?php 
	$db = mysqli_connect('localhost', 'id12999702_pritam', 'rise123', 'id12999702_online')
	or die("Sorry!It cannot connect to mysql database");
?>   
<!-- </form> -->
<div class="se-pre-con"></div>

			<form class="form-horizontal" role="form" id='login' method="post" action="answer1.php">
					<?php 
					$res = "select * from questions where qid='$qid' ORDER BY RAND()";
					$resp=mysqli_query($db, $res);
                    $rows = mysqli_num_rows($resp);
					$i=1;
                while($result=mysqli_fetch_array($resp)){
                	$text=$result['text'];
					$qid=$result['qid'];
					$id=$result['id'];
					$a=$result['optiona'];
					$b=$result['optionb'];
					$c=$result['optionc'];
					$d=$result['optiond'];
					?>

                    <?php if($i==1){?>         
                    <div id='question<?php echo $i;?>' class='cont'>
                    <p class='questions' id="qname<?php echo $i;?>"> <?php echo $i?>.<?php echo $result['text'];?></p>
                   <input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $a;?>
                    <br/>
                    <input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $b;?>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $c;?>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $d;?>
                    <br/>
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>                                                                      
                    <br/>                                                        
                    <br/>
                    <button id='next<?php echo $i;?>' class='next btn btn-success' type='button'>Next</button>
                    </div>     

                     <?php }elseif($i<1 || $i<$rows){?>

                       <div id='question<?php echo $i;?>' class='cont'>
                    <p class='questions' id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $result['text'];?></p>
                  <input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $a;?>
                    <br/>
                    <input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $b;?>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $c;?>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $d;?>          
                    <br/>
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>
                    <br/>
                    <button id='pre<?php echo $i;?>' class='previous btn btn-success' type='button'>Previous</button>                    
                    <button id='next<?php echo $i;?>' class='next btn btn-success' type='button' >Next</button>
                    </div>

                   <?php }elseif($i==$rows || $rows==1){?>
                    <div id='question<?php echo $i;?>' class='cont'>
                    <p class='questions' id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $result['text'];?></p>
                  <input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $a;?>
                    <br/>
                    <input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $b;?>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $c;?>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $d;?>                                                                     
                    <br/>
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>
                    <br/>
                    <button id='pre<?php echo $i;?>' class='previous btn btn-success' type='button'>Previous</button>                  
                    <button id='next<?php echo $i;?>' class='next btn btn-success' type='submit' name="1">Finish</button>
                    </div>
					<?php } $i++;} ?>

				</form>
<?php
$r="SELECT * FROM quiz where qid='$qid' ";
$rest=mysqli_query($db, $r);
  while($row=mysqli_fetch_array($rest) )
{
  $time=$row['time'];
}

?>
<script>
var seconds = <?php echo $time ?>;
var qid= <?php echo $qid ?>;
var t=<?php echo $_POST['total'] ?>;
    function secondPassed() {
    var minutes = Math.floor((seconds)/60);
    var remainingSeconds = seconds %60;
   document.getElementById("countdown").innerHTML = minutes + ":" +    remainingSeconds; 
        if (seconds == 0) {
        clearInterval(countdownTimer);
        window.location.href="answer1.php"; }
    else {
  seconds--;
    }
    }
var countdownTimer = setInterval('secondPassed()', 1000);
</script>
 
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery-1.10.2.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.validate.min.js"></script>

		<script>
		$('.cont').addClass('hide');
		count=$('.questions').length;
		 $('#question'+1).removeClass('hide');

		 $(document).on('click','.next',function(){
		     element=$(this).attr('id');
		     last = parseInt(element.substr(element.length - 1));
		     nex=last+1;
		     $('#question'+last).addClass('hide');

		     $('#question'+nex).removeClass('hide');
		 });

		 $(document).on('click','.previous',function(){
             element=$(this).attr('id');
             last = parseInt(element.substr(element.length - 1));
             pre=last-1;
             $('#question'+last).addClass('hide');

             $('#question'+pre).removeClass('hide');
         });

		</script>
		<script>
		    	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
		</script>
</div>
</div>
</div>
</body>
</html>
<?php } ?>

