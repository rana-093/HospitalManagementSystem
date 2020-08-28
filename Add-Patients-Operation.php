<html>
<head><title>Hello</title></head>
<body >
    <form action="Add Patients Operation.php" method="post">
    Admission_ID:<br><input type="text" name="ID"><br>
    Date:<br><input type = "text" name ="date"><br>
   <!-- Date_Of_Leave:<br><input type="text" name ="DOL"><br> -->
    <!--Bed_ID:<br><input type = "text" name = "BID"><br> -->
    <!--Total_Bill_So_Fare:<br><input type ="text" name = "TBSF"><br> -->
    <input type="SUBMIT">
    <!--<br><a href="Administration.php">Go To Administration</a><br>
    <br><a href="log_in.php">Employee_info</a><br> -->
    
<?php
    $conn=oci_connect("Arg_007","acmicpcioi","localhost/orcl");
    $var = $_POST['ID'] ;
    $vdate = $_POST['date'];
    if(isset($var) && isset($vdate)){
        
    $sql1 = "SELECT OPERATION_TYPE_ID,OPERATION_NAME FROM OPERATION_TYPE" ;
    $output=oci_parse($conn,$sql1);
    $result=oci_execute($output);
    #$id = $var*1000 + $cnt_till_no
    
    echo "Select Which Opearation has been done : </br>";
    $a = 0;
    while(($rw = oci_fetch_array($output,OCI_BOTH))!=false){
      $a = $a+1;
        echo $a;
        ?>
        <input type = "checkbox" name = "Dis[]" value = <?php echo $rw[0] ?> > <?php echo $rw[1] ?>
        <?php
            echo "</br>"."\xA";
    }
    $s = "SELECT COUNT(*) FROM OPERATION";
    $out = oci_parse($conn, $s);
    $res = oci_execute($out);
    $cnt = -1;
    while(($row = oci_fetch_array($out,OCI_BOTH))!=false){
        $cnt = $row[0];
    }
    $cnt = $cnt+1;
    $dis = $_POST['Dis'] ;
    $sz = count($dis) ;
    for($i=0; $i<$sz; $i=$i+1){
        $cnt = $cnt+1;
        $sql2 = "INSERT INTO OPERATION (OPERATION_ID,OPERATION_TYPE_ID,ADMISSION_ID,OPERATION_DATE) VALUES ('$cnt','$i','$var','$vdate')";   
        $arg = oci_parse($conn,$sql2);
        $ar = oci_execute($arg);
    }
    
    ?>
    <input type = "SUBMIT" value ="Submit">
    </form>
    
    <?php
    }
oci_close($conn);
?> 

</body
</html>


