<html>
<head><title>Hello</title></head>
<body  >
    <form action="Add_Operation_Type.php" method="post">
    Operation_Type_Name:<br><input type="text" name="otn"><br>
    Cost:<br><input type = "text" name = "c"><br>
    <input type="SUBMIT" value = "Add Opeations">
    </form>
<?php
    $conn=oci_connect("Arg_007","acmicpcioi","localhost/orcl");
    $output=oci_parse($conn,'SELECT COUNT(*) FROM OPERATION_TYPE');
    $result=oci_execute($output); 
    while( ($row = oci_fetch_array($output,OCI_BOTH)) != false ){
        $cnt_till_now = $row[0] ;
    }
    $id = $cnt_till_now + 1 ;
    $t = $_POST['otn'];
    $C = $_POST['c'];
if( strlen($t)!=0 && strlen($C)!=0 )
{
    echo $id ;
    $sql="INSERT INTO OPERATION_TYPE(OPERATION_TYPE_ID,OPERATION_NAME,OPERATION_COST) VALUES ('$id','$t','$C')";
    $output=oci_parse($conn,$sql);
    $tot=oci_execute($output);
}
    oci_close($conn);
?> 

</body
</html>