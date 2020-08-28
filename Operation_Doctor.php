<?php
    $conn=oci_connect("Arg_007","acmicpcioi","localhost/orcl");
    if(isset($_POST['operation_id'])){
    $i = $_POST['operation_id'];
    $sql1 = "SELECT E.EMPLOYEE_NAME FROM EMPLOYEE_INFO E 
    JOIN OPERATION_DOCTOR OD 
    ON(E.EMPLOYEE_ID = OD.EMPLOYEE_ID AND OD.OPERATION_ID = '$i' AND E.EMPLOYEE_TYPE = 'Doctor')" ;
    $output=oci_parse($conn,$sql1);
    $result=oci_execute($output);
    $cnt = -1;
    while( ($row = oci_fetch_array($output,OCI_BOTH))!= false){
        echo $row[0]."</br>";
    }
    }
      
oci_close($conn);
?> 
