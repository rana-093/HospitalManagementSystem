<html>
<head><title>Hello</title></head>
<body background="hospital_5.jpg" style="background-repeat:none; " >
    <form action="Patients_Info.php" method="post"/>
    NAME:<br><input type="text" name="name"><br>
    ADDRESS:<br><input type="text" name="addr"><br>
     BD:<br><input type = "text" name ="bd"><br>
    GENDER:<br><input type="text" name ="gen"><br>
    <input type="SUBMIT">
    <br><a href="Administration.php">Go To Administration</a><br>
    <br><a href="log_in.php">Employee_info</a><br>
    </form>
<?php
    $conn=oci_connect("Arg_007","acmicpcioi","localhost/orcl");
    $output=oci_parse($conn,'SELECT COUNT(*) FROM PATIENT');
    $result=oci_execute($output); 
    
    while( ($row = oci_fetch_array($output,OCI_BOTH)) != false ){
        $cnt_till_now = $row[0] ;
    }
    $id = $cnt_till_now + 1 ;
    $Nam = $Addr = $Gen = $B_D = "";
    /*
if(isset($_POST['name']) && isset($_POST['addr']) && isset($_POST['gen']) && isset($_POST['bd'])  )
{
    $Nam = $_POST['name'];
    $Addr = $_POST['addr'];
    $Gen = $_POST['gen'];
    $B_D = $_POST['bd'];
    echo'Congrats!Your patient ID is '.$id;
    $sql="INSERT INTO PATIENT(PATIENT_ID,PATIENT_NAME,ADDRESS,BIRTHDATE,GENDER) VALUES ('$id','$Nam','$Addr','$B_D','$Gen')";
    $output=oci_parse($conn,$sql);
    $tot=oci_execute($output);
}
*/
    $Nam = $_POST['name'];
    $Addr = $_POST['addr'];
    $Gen = $_POST['gen'];
    $B_D = $_POST['bd'];
 
 if( strlen($Nam)!=0 && strlen($Addr)!=0 && strlen($Gen)!=0 && strlen($B_D)!=0  )
{
    echo'Your patient ID is '.$id;
    $sql="INSERT INTO PATIENT(PATIENT_ID,PATIENT_NAME,ADDRESS,BIRTHDATE,GENDER) VALUES ('$id','$Nam','$Addr','$B_D','$Gen')";
    $output=oci_parse($conn,$sql);
    $tot=oci_execute($output);
     ?>
    <form action = "Admission_Main_Page.php" method = "post">
    <input type = "SUBMIT" value = "Go To AdmissionPage">
    </form>
    <?php
}
        
oci_close($conn);
?> 

</body
</html>