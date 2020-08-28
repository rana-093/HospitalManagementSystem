<html>
<head><title>Hello</title></head>
<body >
    <form action="Admission_Main_Page.php" method="post"/>
    Patient_ID:<br><input type="text" name="ID"><br>
    Date_Of_Admit:<br><input type = "text" name ="DOA"><br>
    Date_Of_Leave:<br><input type="text" name ="DOL"><br>
    Bed_ID:<br><input type = "text" name = "BID"><br>
    Total_Bill_So_Fare:<br><input type ="text" name = "TBSF"><br>
    <input type="SUBMIT">
    <!--<br><a href="Administration.php">Go To Administration</a><br>
    <br><a href="log_in.php">Employee_info</a><br> -->
    </form>
<?php
    $conn=oci_connect("Arg_007","acmicpcioi","localhost/orcl");
    $output=oci_parse($conn,'SELECT COUNT(*) FROM ADMISSION');
    $result=oci_execute($output); 
    
    while( ($row = oci_fetch_array($output,OCI_BOTH)) != false ){
        $cnt_till_now = $row[0] ;
    }
    $id = $cnt_till_now + 1 ;
if(isset($_POST['ID']) && isset($_POST['DOA']) && isset($_POST['DOL']) && isset($_POST['BID']) && isset($_POST['TBSF'])  )
{
    $patientID = $_POST['ID'];
    $Doa = $_POST['DOA'];
    $Dol = $_POST['DOL'];
    $Bid = $_POST['BID'];
    $Tbsf = $_POST['TBSF'];
    echo'Congrats!Your Admission ID is '.$id;
    $sql="INSERT INTO ADMISSION(ADMISSION_ID,PATIENT_ID,DATE_OF_ADMIT,DATE_OF_LEAVE,BED_ID,TOTAL_BILL_SO_FAR) VALUES ('$id','$patientID','$Doa','$Dol','$Bid','$Tbsf')";
    $output=oci_parse($conn,$sql);
    $tot=oci_execute($output);
}

oci_close($conn);
?> 

</body
</html>


