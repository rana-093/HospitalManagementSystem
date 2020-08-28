<?php
$conn = oci_connect("hr","hr","localhost/orcl");
$id = $_POST['operation_id'];
if(isset($id)){
    echo "this operation is done by the following doctors : </br></br>";
    $sql = "SELECT EI.EMPLOYEE_NAME  FROM EMPLOYEE_INFO EI 
    JOIN OPERATION_DOCTOR OD
    ON (EI.EMPLOYEE_ID = OD.EMPLOYEE_ID AND OD.OPERATION_ID = '$id')
    ";
    $output = oci_parse($conn,$sql);
    $result = oci_execute($output);
     while( ($row = oci_fetch_array($output,OCI_BOTH))!= false )
    {
         echo $row[0]."</br>";
    }
     echo "</br></br>";
    echo "Operation related information is given below </br></br>";
    $sql1= "SELECT OT.OPERATION_NAME, OT.OPERATION_COST,OP.OPERATION_DATE,OP.OPERATION_REPORT
    FROM OPERATION OP JOIN OPERATION_TYPE OT 
    ON(OP.OPERATION_TYPE_ID = OT.OPERATION_TYPE_ID AND OP.OPERATION_ID = '$id') ";
    $output1 = oci_parse($conn,$sql1);
    $resul1 = oci_execute($output1);
     while( ($row = oci_fetch_array($output1,OCI_BOTH))!= false )
    {
         echo $row[0]."  ".$row[1]."  ".$row[2]." ".$row[3]."</br>";
    }
    echo "</br></br>";
    echo "Patients information of this operation is given below </br></br>";
    
    $sql2 = "
    SELECT O.ADMISSION_ID , PA.PATIENT_NAME 
    FROM OPERATION O JOIN ADMISSION AD
    ON(O.ADMISSION_ID = AD.ADMISSION_ID AND OPERATION_ID = '$id')
    JOIN PATIENT PA
    ON(AD.PATIENT_ID = PA.PATIENT_ID)
    ";
    $output2 = oci_parse($conn,$sql2);
    $result2 = oci_execute($output2);
     echo "</br></br>";
     while( ($row = oci_fetch_array($output2,OCI_BOTH))!= false )
    {
         echo $row[0]."  ".$row[1]."</br>";
    }
    
    oci_close($conn);
    
    
   
    
    
}


?>