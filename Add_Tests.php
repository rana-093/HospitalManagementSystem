<html>
<head><title>Hello</title></head>
<body  >
    <form action="Add_Tests.php" method="post">
    Test Name:<br><input type="text" name="otn"><br>
    Cost Of The Test:<br><input type ="text" name = "c"><br>
    <input type="SUBMIT" value = "Add Tests">
    </form>
<?php
    $conn=oci_connect("Arg_007","acmicpcioi","localhost/orcl");
    $output=oci_parse($conn,'SELECT COUNT(*) FROM TESTS');
    $result=oci_execute($output); 
    while( ($row = oci_fetch_array($output,OCI_BOTH)) != false ){
        $cnt_till_now = $row[0] ;
    }
    $id = $cnt_till_now + 1 ;
      $t = $_POST['otn'];
    $C = $_POST['c'];
if(strlen($t)!=0 && strlen($C)!=0 )
{
    echo $id ;
    $sql="INSERT INTO TESTS (TEST_ID,TEST_NAME,TEST_COST) VALUES ('$id','$t','$C')";
    $output=oci_parse($conn,$sql);
    $tot=oci_execute($output);
}
    oci_close($conn);
?> 

</body
</html>