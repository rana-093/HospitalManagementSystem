<html>

<head><title>Hello</title></head>
    
<body>
    
    <form action="assign_bed.php" method="post"/>
    ID:<br><input type="text" name="ID"><br>
    BED_ID:<br><input type="text" name="BED_ID"><br>
    START_DATE:<br><input type="text" name="START_DATE"><br>
    <input type = "SUBMIT"><br>
    
    <?php 
    
     $conn=oci_connect("Arg_007","acmicpcioi","localhost/orcl");
    
    $id = $_POST['ID'] ; $bed_id = $_POST['BED_ID'] ; $start_date = $_POST['START_DATE'] ;
    $end_date = "1/JAN/2099" ;
               
    if( strlen( $id )!=0 && strlen( $bed_id )!=0 && strlen( $start_date )!=0 )
    {
        $sql = "INSERT INTO ADMISSION_BED (ADMISSION_ID,BED_ID,START_DATE,END_DATE) VALUES ('$id','$bed_id','$start_date','$end_date')" ;
        $output=oci_parse($conn,$sql);
        $tot = oci_execute($output) ;
    }
               
    
        
/*        $sql="INSERT INTO TESTS (TEST_ID,TEST_NAME,TEST_COST) VALUES ('$id','$t','$C')";
    $output=oci_parse($conn,$sql);
    $tot=oci_execute($output);

    */
    ?>
    
    
    </body>

</html>