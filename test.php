<form action = 'test.php' method = 'post'>
<?php
for ($i = 1; $i <= 3; $i++) {
?>
<input type="radio" name="num" value="<?php echo $i*1000; ?>"><?php echo $i*5; ?><br>
<?php
}
?>
<input type = 'submit' value = 'Go'>
</form>


<?php

$n = $_POST['num'] ;
if( strlen($n)!=0 ) echo $n ;
else echo "not" ;

?>
