<?php
    $conn=oci_connect("hr","hr","localhost/orcl");
    if(isset($_POST['Id'])){
    $i = $_POST['Id'];
    ?>
     <form action = "Pending_Operations_Of_Patients.php" method = "post" >
    <input type = "SUBMIT" value = "Show My Pending Operations">
    <input type = "hidden" name = "id" value = <?php echo $i?> >
    </form>
   <?php
    $totalBillTillNow = 0 ;
    
    $sql2 = "SELECT B.COSTS*(SYSDATE-ab.START_DATE)
FROM BED B JOIN admission_bed ab ON (b.bed_id = ab.bed_id)
JOIN admission ad ON (ad.admission_id= ab.admission_id) 
WHERE ab.end_date = '1/JAN/2099' and ad.admission_id = '$i' " ;    
    
    $output1 = oci_parse($conn,$sql2) ;
    $result1 = oci_execute($output1) ; 
    $cur_bill = 0 ;
    while( ($row = oci_fetch_array($output1,OCI_BOTH))!= false )
    {
        $cur_bill = $row[0] ;
    }

        
    
    $sql2 = "SELECT bed_id , b.room_no  , ab.start_date , ab.end_date, (ab.end_date-ab.start_date+1)*b.costs ,sysdate
    FROM admission_bed ab join bed b using( bed_id )  
    where ab.admission_id='$i' " ;
    
    $output1 = oci_parse($conn,$sql2) ;
    $result1 = oci_execute($output1) ; 
    $inf = "01-JAN-99" ;
        
    while( ($row = oci_fetch_array($output1,OCI_BOTH))!= false )
    {
         if( $row[3]!=$inf ) echo $row[0]." ".$row[1]." ".$row[2]." ".$row[3]." ".$row[4] ;
        else echo $row[0]." ".$row[1]." ".$row[2]." current"." ".$cur_bill ;
        if( $row[3]!=$inf ) $totalBillTillNow += (int)$row[4] ;
        echo "</br>" ;
    }
    $totalBillTillNow += $cur_bill ;
    $sql1 = "SELECT OT.OPERATION_NAME,O.OPERATION_DATE,O.OPERATION_ID,OT.OPERATION_COST FROM OPERATION_TYPE OT
    JOIN OPERATION O ON(OT.OPERATION_TYPE_ID = O.OPERATION_TYPE_ID AND O.ADMISSION_ID='$i')  " ;
    $output=oci_parse($conn,$sql1);
    $result=oci_execute($output);
    
    while( ($row = oci_fetch_array($output,OCI_BOTH))!= false){
        
        $totalBillTillNow += (int)$row[3] ;
        ?>

        <form action = "Operation_Doctor.php" method="post">
        <input type = "radio" name="operation_id" value ="<?php echo $row[2]; ?>"><?php echo $row[0]."    ".$row[1]."   ".$row[3] ?><br>
        <?php
    }
        echo $totalBillTillNow ;
        ?>

        <input type = 'submit' value = 'Go'>
            </form>
<?php
            
    }
      
oci_close($conn);
?>