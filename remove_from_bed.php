<html>

<head><title>Hello</title></head>
    
<body>
    
    <form action="remove_from_bed.php" method="post"/>
    ID:<br><input type="text" name="ID"><br>
    END_DATE:<br><input type="text" name="END_DATE"><br>
    <input type = "SUBMIT"><br>
    
    <?php 
    
     $conn=oci_connect("Arg_007","acmicpcioi","localhost/orcl");
    
    $id = $_POST['ID'] ; $end_date = $_POST['END_DATE'] ;
    $inf = "1/JAN/2099" ;
    
    if( strlen( $id )!=0 )
    {
        $sql = "UPDATE ADMISSION_BED SET END_DATE='$end_date' WHERE END_DATE = '$inf' " ;
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