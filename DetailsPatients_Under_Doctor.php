<?php 
$conn = oci_connect("hr","hr","localhost/orcl");
$id = $_POST['patient_id'];
if(isset($id)){
    $sql = "SELECT * FROM PATIENT WHERE PATIENT_ID = '$id' ";
    $output = oci_parse($conn,$sql);
    $tot = oci_execute($output);
    while (($row = oci_fetch_array($output, OCI_BOTH)) != false) {
    echo $row[0] . "   " . $row[1]. "   " . $row[2]. "    ".$row[3]."   ".$row[4]."</br>";
}

    
    
    
    
    
}




?>
