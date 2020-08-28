<?php
    $id = $_POST['id'];
    #echo $id;
    $conn = oci_connect("hr","hr","localhost/orcl");
    if(isset($_POST['id'])){
    $sql = "SELECT OP.OPERATION_ID,OT.OPERATION_NAME,OT.OPERATION_COST,OP.OPERATION_TYPE_ID,OP.OPERATION_DATE,OP.OPERATION_REPORT
    FROM OPERATION OP JOIN OPERATION_DOCTOR OD 
    ON (OD.EMPLOYEE_ID = '$id')
    JOIN OPERATION_TYPE OT
    ON (OT.OPERATION_TYPE_ID = OP.OPERATION_TYPE_ID) ";
    $output=oci_parse($conn,$sql);
    $result=oci_execute($output);
    
        ?>
        
    <form action = "Show_Past_Operation_Details.php" method="post">
        
        
        <?php
    while( ($row = oci_fetch_array($output,OCI_BOTH))!= false){
        ?>
        <input type = "radio" name="operation_id" value ="<?php echo $row[0]; ?>"><?php echo $row[1]."    ".$row[2]."   ".$row[3]."   ".$row[4]."   ".$row[5] ?><br>
        
        <?php
    }
   ?>
    <!--<form action = "Show_Past_Operation_Details.php" method="post"> -->
    <input type = "SUBMIT" value = "Go"> 
    <!--    </form> -->
<?php
    oci_close($conn);
    }
?>