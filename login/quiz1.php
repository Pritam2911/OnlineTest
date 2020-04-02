<?php 
 include_once 'index.php';
 if(!(isset($_SESSION['username']))){
header("location:admin.php");

}
else{
?>
<html>
<head>
  <title>Online Exam</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
  
</head>
<body onload="secondPassed()" id="bodydiv">
<link rel="stylesheet" href="../css/quiz.css" type="text/css">
<div class="body-content">
  <div class="module">
    <div onselectstart="return false;">
    <h1 style="color:red;text-align: center">Exam<span id="countdown" class="timer"></span></h1>


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

<div class="se-pre-con"></div>
<div id="qbody">
			<form class="form-horizontal" role="form" id='login' method="post" action="answer2.php">
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
                   <input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>' onClick="addPoll(this.name,this.value)"/><?php echo $a;?>
                    <br/>
                    <input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>' onClick="addPoll(this.name,this.value)"/><?php echo $b;?>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>' onClick="addPoll(this.name,this.value)"/><?php echo $c;?>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>' onClick="addPoll(this.name,this.value)"/><?php echo $d;?>
                    <br/>
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'  addPoll(this.name,this.value)/>                                                                      
                    <br/>                                                        
                    <br/>
                    <button id='next<?php echo $i;?>' class='next btn btn-success' type='button' name="save" >Next</button>

                    </div>     

                     <?php }elseif($i<1 || $i<$rows){?>

                       <div id='question<?php echo $i;?>' class='cont'>
                    <p class='questions' id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $result['text'];?></p>
                  <input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>' onClick="addPoll(this.name,this.value)"/><?php echo $a;?>
                    <br/>
                    <input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>' onClick="addPoll(this.name,this.value)"/><?php echo $b;?>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>' onClick="addPoll(this.name,this.value)"/><?php echo $c;?>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>' onClick="addPoll(this.name,this.value)"/><?php echo $d;?>          
                    <br/>
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>' onClick="addPoll(this.name,this.value)"/>
                    <br/>
                    <button id='pre<?php echo $i;?>' class='previous btn btn-success' type='button'>Previous</button>                    
                    <button id='next<?php echo $i;?>' class='next btn btn-success' type='button' name="save" >Next</button>

                    </div>

                   <?php }elseif($i==$rows || $rows==1){?>
                    <div id='question<?php echo $i;?>' class='cont'>
                    <p class='questions' id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $result['text'];?></p>
                  <input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>' onClick="addPoll(this.name,this.value)"/><?php echo $a;?>
                    <br/>
                    <input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>' onClick="addPoll(this.name,this.value)"/><?php echo $b;?>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>' onClick="addPoll(this.name,this.value)"/><?php echo $c;?>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>' onClick="addPoll(this.name,this.value)"/><?php echo $d;?>                                                                     
                    <br/>
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>' addPoll(this.name,this.value)/>
                    <br/>
                    <button id='pre<?php echo $i;?>' class='previous btn btn-success' type='button'>Previous</button>                  
                    <!--<button id='' class='next btn btn-success' type='submit' name="1">Finish</button>-->
                    </div>
					<?php } $i++;} ?>
 <button id='' class='btn btn-success' type='submit' name="1">Finish</button>
				</form>
				</div>
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
        window.location.href="r1.php"; }
    else {
  seconds--;
    }
    }
var countdownTimer = setInterval('secondPassed()', 1000);
</script>
 
<script type="text/javascript">
  function addPoll(id,value) {

          if($("input[type='radio']:checked").length != 0){
    // var answer = $("input[type='radio']:checked").val();
    var answer=value;
    var qid = <?php echo $qid ?>;
    // var qn =$("input[type='radio']:checked").attr("name");
    var qn=id;
    $.ajax({
      type: "POST", 
      url: "insert.php", 
      data : "qid="+qid+"&qn="+qn+"&answer="+answer,
      processData : false,

    });
      
  }
    
}

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

