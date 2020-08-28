<html>
<head><title>Hello</title></head>
<body >
    <form action="Admission_Main_Page.php" method="post">
    Patient_ID:<br><input type="text" name="ID"><br>
    Date_Of_Admit:<br><input type = "text" name ="DOA"><br>
   <!-- Date_Of_Leave:<br><input type="text" name ="DOL"><br> -->
    Bed_ID:<br><input type = "text" name = "BID"><br>
    <!--Total_Bill_So_Fare:<br><input type ="text" name = "TBSF"><br>
    <input type="SUBMIT">
    <!--<br><a href="Administration.php">Go To Administration</a><br>
    <br><a href="log_in.php">Employee_info</a><br> -->
    
<?php
    $conn=oci_connect("Arg_007","acmicpcioi","localhost/orcl");
    $var = $_POST['ID'] ;
    $sql1 = "SELECT COUNT(*) FROM ADMISSION WHERE FLOOR(ADMISSION_ID/1000)= '$var' " ;
    $output=oci_parse($conn,$sql1);
    $result=oci_execute($output); 
    while( ($row = oci_fetch_array($output,OCI_BOTH))!=false ){
        $cnt_till_now = $row[0];
    }
    $id = $var*1000 + $cnt_till_now + 1 ;
    $out = oci_parse($conn,'SELECT * FROM DISEASE');
    $res = oci_execute($out);
    echo "Select Your Disease</br>";
    while(($rw = oci_fetch_array($out,OCI_BOTH))!=false){
        ?>
        <input type = "checkbox" name = "Dis[]" value = <?php echo $rw[0] ?> /> <?php echo $rw[1] ?>
        <?php
            echo "</br>"."\xA";
    }
    ?>
    <input type = "SUBMIT" value ="Submit">
    </form>
    <?php
    $dis = $_POST['Dis'] ;
    $sz = count($dis) ;
    $patientID = $_POST['ID'];
    $Doa = $_POST['DOA'];
    $Bid = $_POST['BID'];
if( strlen($patientID)!=0 && strlen($Doa)!=0 && strlen($Bid)!=0 && $sz!=0  )
{
    echo'Congrats!Your Admission ID is '.$id;
    $sql2="INSERT INTO ADMISSION(ADMISSION_ID,PATIENT_ID,DATE_OF_ADMIT,DATE_OF_LEAVE,BILL) VALUES ('$id','$patientID','$Doa','01-JAN-2099','0')";
    $o2=oci_parse($conn,$sql2);
    $tot=oci_execute($o2);
    for($i=0 ; $i<$sz ; $i++)
    {
    #    echo( $dis[$i] ." " ) ;
    #    echo "</br>" ;
    #    $j = $i+1 ;
        $sql3 = "INSERT INTO ADMISSION_DISEASE(ADMISSION_ID,DISEASE_ID) VALUES ( '$id' , '$dis[$i]' )" ;
        $o3 = oci_parse($conn,$sql3) ;
        $tot1 = oci_execute($o3) ;
    }
    $end_date = "1/JAN/2099" ;
    $sql4 = "INSERT INTO ADMISSION_BED (ADMISSION_ID,BED_ID,START_DATE,END_DATE) VALUES ('$id','$Bid','$Doa','$end_date')" ;
    $o4 = oci_parse( $conn,$sql4 ) ;
    $tot2 = oci_execute($o4) ;
    
}

oci_close($conn);
?> 

</body
</html>


