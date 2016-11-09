 <?php
 echo "attempting to mail";
 echo "<br/>";
 echo "is this working?";
// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("drewpereli@gmail.com","My subject",$msg);
?> 