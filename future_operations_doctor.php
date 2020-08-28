<html> 
<head><title>Hello</title></head>
<body>
    
    <?php    
    $id = $_POST['id'] ;
    echo $id ;
    
    $conn=oci_connect("Arg_007","acmicpcioi","localhost/orcl");
    
    
    $sql = " SELECT pending_operation_id , op.operation_date , op.operation_time  
FROM PENDING_OPERATION op join PENDING_OPERATION_DOCTOR opdoc using (PENDING_OPERATION_ID) 
where opdoc.employee_id = '$id'  " ;
    $output = oci_parse($conn,$sql) ;
    $tot = oci_execute($output) ;
    
    ?>
   <form action = "http://localhost/Project/future_operations_(doctor).php" method="post" >
    <input type="hidden" name="id" value= "<?php echo $id ; ?>" >

    <?php

    while( ($row = oci_fetch_array($output,OCI_BOTH))!= false)
    {
        echo $row[0]."  ".$row[1]."  ".$row[2] ;
        ?>
            
        <input type="checkbox" name="done[]" value=<?php echo $row[0] ; ?> /> Done
    <?php
    }
?>    
    <input type = "SUBMIT" value = "Add" />
    </form>

 <?php
        
    if( isset( $_POST['done'] ) )
    {
        echo "hello" ;
        $done = $_POST['done'] ;
    
    $sz = count($done) ;
    
    echo $sz ;
    
    $dn = "23/JAN/2018" ;
    for($i=0 ; $i<$sz ; $i++)
    {
        echo $done[$i] ;
        $sql = "UPDATE PENDING_OPERATION SET OPERATION_DATE = '$dn' WHERE PENDING_OPERATION_ID = '$done[$i]' " ;
        
        $output = oci_parse($conn,$sql) ;
        $tot = oci_execute($output) ;
    }
           
    }

    oci_close($conn);
    ?>
    
    
</body>
</html>