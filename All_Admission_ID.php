<?php
$conn = oci_connect("hr","hr","localhost/orcl");
$id = $_POST['ID'];
if(isset($id)){
    $sql = "SELECT ADMISSION_ID , DATE_OF_ADMIT 
    FROM ADMISSION 
    WHERE FLOOR(ADMISSION_ID/1000)='$id'";
    $output = oci_parse($conn,$sql);
    $tot = oci_execute($output);
    ?>
    <form action="PatientsQuery.php" method="post" >
        <?php
    while( ($row = oci_fetch_array($output,OCI_BOTH))!= false){
        echo $row[0];
        ?>
        <input type = "radio" name="Id" value ="<?php echo $row[0]; ?>"  <?php echo $row[1] ?> > <br>
        
    <?php
    }
}
?>
    <!--<form action = "Show_Past_Operation_Details.php" method="post"> -->
    <input type = "SUBMIT" value = "Go"> 