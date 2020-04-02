<form action="" method="post">
<input type="radio" name="credit_card" value="MasterCard" checked="checked">MasterCard<br>
<input type="radio" name="credit_card" value="Visa">Visa<br>
<input type="radio" name="credit_card" value="American Express">American Express<br>
<input type="submit" name="button" value="Submit"/></form>
<?php
$credit_card="";
$credit_card= $_POST['credit_card'];
echo 'The credit card you want to use is' . $credit_card;

?>
