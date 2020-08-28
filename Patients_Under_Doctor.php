<?php
$conn = oci_connect("hr","hr","localhost/orcl");
$id = $_POST['id'];
if(isset($id)){
$sql = "SELECT PA.PATIENT_ID,PA.PATIENT_NAME FROM PATIENT PA  JOIN ADMISSION AD ON( AD.ASSIGNED_DOCTOR = '$id' AND PA.PATIENT_ID = AD.PATIENT_ID)" ;
$output = oci_parse($conn,$sql);
$tot = oci_execute($output);
?>
<form action="Details(Patients_Under_Doctor).php" method="post">
    
     <?php
    while( ($row = oci_fetch_array($output,OCI_BOTH))!= false){
        ?>
        <input type = "radio" name="patient_id" value ="<?php echo $row[0]; ?>"><?php echo $row[1] ?><br>
        
        <?php   
}
    ?>
    
    <input type = "SUBMIT" value = "go">
    <?php

}


?>