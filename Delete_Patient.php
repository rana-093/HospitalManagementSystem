<html>
<head><title>Hello</title></head>
<body  >
    <form action="Delete_Patient.php" method="post">
    Patient_ID:<br><input type="text" name="ID"><br>
    <input type="SUBMIT" value = "Delete Patient">
    </form>
<?php
    $conn=oci_connect("Arg_007","acmicpcioi","localhost/orcl");
    $t = $_POST['ID'];
if(strlen($t)!=0 )
{
    $sql ="DELETE FROM PATIENT WHERE PATIENT_ID = '$t' " ;
    $output=oci_parse($conn,$sql);
    $result=oci_execute($output); 
}
    oci_close($conn);
?> 

</body
</html>