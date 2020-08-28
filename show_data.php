<html>
<head><title>Oracle demo</title></head>
<body>
    
	<?php 
	$conn=oci_connect("project","pass","localhost/nas");
    
    
    $query="SELECT ID, NAME, USERNAME FROM PERSON ";
    $stmnt=oci_parse($conn,$query);
    $result=oci_execute($stmnt); 
    
    while (($row = oci_fetch_array($stmnt, OCI_BOTH)) != false) {
    echo $row[0] . "\t" . $row[1]   . "\t" . $row[2]. "\n\t\n"."</br>";
    

}
    
    

oci_close($conn);
?>
    
    

</body>
</html>
