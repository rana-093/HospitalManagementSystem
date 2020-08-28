<html>
<head><title>Hello</title></head>
<body  >
    <form action="Add Disease.php" method="post"/>
    DISEASE_NAME:<br><input type="text" name="name"><br>
    <input type="SUBMIT" value = "Add Disease"><br>
    </form>
<?php
    $conn=oci_connect("hr","hr","localhost/orcl");
    $output=oci_parse($conn,'SELECT COUNT(*) FROM DISEASE');
    $result=oci_execute($output); 
    while( ($row = oci_fetch_array($output,OCI_BOTH)) != false ){
        $cnt_till_now = $row[0] ;
    }
    $id = $cnt_till_now + 1 ;
  
if(isset($_POST['name']) && !(empty($_POST['name']) ))
{
    $t = $_POST['name'];
    $sql="INSERT INTO DISEASE(DISEASE_ID,DISEASE_NAME) VALUES ('$id','$t')";
    $output=oci_parse($conn,$sql);
    $tot=oci_execute($output);
}
    oci_close($conn);
    
?> 

</body
</html>