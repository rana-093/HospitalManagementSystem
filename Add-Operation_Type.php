<html>
<head><title>Hello</title></head>
<body  >
    <form action="Add Operation_Type.php" method="post"/>
    Operation_Type_Name:<br><input type="text" name="otn"><br>
    Cost:<br><input type = "text" name = "c"><br>
    <input type="SUBMIT" value = "Add Opeations">
    </form>
<?php
    $conn=oci_connect("hr","hr","localhost/orcl");
    $output=oci_parse($conn,'SELECT COUNT(*) FROM OPERATION_TYPE');
    $result=oci_execute($output); 
    while( ($row = oci_fetch_array($output,OCI_BOTH)) != false ){
        $cnt_till_now = $row[0] ;
    }
    $id = $cnt_till_now + 1 ;
  
if(isset($_POST['otn']) && !(isset($_POST['c']) ))
{
    $t = $_POST['otn'];
    $C = $_POST['c'];
    $sql="INSERT INTO OPERATION_TYPE(OPERATION_TYPE_ID,OPERATION_NAME,OPERATION_COST) VALUES ('$id','$t','$C')";
    $output=oci_parse($conn,$sql);
    $tot=oci_execute($output);
}
    oci_close($conn);
?> 

</body
</html>