<?php
$conn = oci_connect("hr","hr","localhost/orcl");
$id = $_POST['id'];
if(isset($id)){
    $sql = "SELECT * FROM PENDING_OPERATION
WHERE ADMISSION_ID ='$id'
";
    $output = oci_parse($conn,$sql);
    $tot = oci_execute($output);
    ?>

    <form action="Pending_Operations_Of_Patients.php" method="post" >
        <?php
    while( ($row = oci_fetch_array($output,OCI_BOTH))!= false){
        echo $row[0]."    ".$row[1]."    ".$row[2]."   ".$row[3]."    ".$row[4]."   ".$row[5]."</br>";
        
    }
}
?>
    <!--<form action = "Show_Past_Operation_Details.php" method="post"> -->