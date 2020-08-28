<html> 
<head><title>Hello</title></head>
<body>
    <form action="add_operation_(admin).php" method="post">
    Admission_ID:<br><input type="text" name="id"><br>
    Opeation Date:<br><input type = "text" name ="date"><br>
    Time(in 24 hour format) :<br> <input type = "text" name = "tme"><br>
    
        
    <?php
        
        $conn=oci_connect("Arg_007","acmicpcioi","localhost/orcl");
        
        $output = oci_parse( $conn, "SELECT * FROM OPERATION_TYPE " ) ;
        $tot = oci_execute( $output ) ;
        
        while( ($row = oci_fetch_array($output,OCI_BOTH))!= false)
        {
        
        ?>    
            
        <form action = "add_operation_(admin).php" method="post"/>
        <input type = "radio" name="operation_type" value ="<?php echo $row[0]; ?>"><?php echo $row[1]."    ".$row[2] ?><br>
        
        <?php
            
        }
        
        $output = oci_parse($conn, " SELECT employee_id , e.employee_name , d.specialization , d.degrees
from employee_info e join doctors d using(employee_id) "  ) ;
        $tot = oci_execute( $output ) ;
        
        while( ($row = oci_fetch_array($output,OCI_BOTH))!= false)
        {
        
        ?>    

        <input type = "checkbox" name = "Doc[]" value = "<?php echo $row[0] ; ?>" > <?php echo $row[0]." ".$row[1]." ".$row[2]." ".$row[3] ?><br>

        <?php            
        }
        ?>
        
        
        <input type = "radio" name="operation_status" value ="Pending"><?php echo Pending ?><br>
        <input type = "radio" name="operation_status" value ="Done"><?php echo Done ?><br>
        
        <input type = 'submit' value = 'Add'>
        </form>
<?php

    $operation_status = $_POST['operation_status'] ;
    $doc = $_POST['Doc'] ;
    $sz = count($doc) ;
    $op_type = $_POST['operation_type'] ;
    $admission_id = $_POST['id'] ;
    $op_date = $_POST['date'] ;
    $op_time = $_POST['tme'] ;
    
    if( strlen($admission_id)!=0 && strlen($op_date)!=0 && strlen($op_time)!=0 && $sz!=0  )
    {
        $output = oci_parse($conn,'SELECT NVL(MAX(PENDING_OPERATION_ID), 0) FROM PENDING_OPERATION') ;
        $tot = oci_execute($output) ;
        
        $operation_id = -1 ;
        while( ($row = oci_fetch_array($output,OCI_BOTH))!= false )
        {
            $operation_id = $row[0] + 1 ;
        }
        
        
        $sql = " INSERT INTO PENDING_OPERATION (PENDING_OPERATION_ID,OPERATION_TYPE_ID,ADMISSION_ID,OPERATION_DATE,OPERATION_TIME,OPERATION_STATUS)
VALUES( '$operation_id','$op_type', '$admission_id','$op_date','$op_time' , '$operation_status' ) " ;
        
        $output = oci_parse( $conn , $sql ) ;
        $tot = oci_execute($output) ;
        
        for($i=0 ; $i<$sz ; $i++)
        {
            $sql = " INSERT INTO pending_operation_doctor(PENDING_OPERATION_ID, employee_id)  VALUES('$operation_id','$doc[$i]') " ;
            $output = oci_parse($conn,$sql) ;
            $tot = oci_execute($output) ;
        }
        
    }
        oci_close($conn);
       ?> 
    
</body>
</html>