<html>
<head><title>Hello</title></head>
<body background="hospital_5.jpg" style="background-repeat:none; " >
    <form action="Add_Employee.php" method="post"/>
    NAME:<br><input type="text" name="name"><br>
    ADDRESS:<br><input type="text" name="addr"><br>
     BD:<br><input type = "text" name ="bd"><br>
    GENDER:<br><input type="text" name ="gen"><br>
    EMPLOYEE TYPE:<br><input type = "text" name = "etype"><br>
    SALARY :<br><input type = "text" name = "sal"> <br>
    EMAIL:<br><input type = "text" name = "email"><br>
    PASSWORD :<br><input type = "text" name = "pass"><br>
    <input type="SUBMIT">
    <br><a href="Administration.php">Go To Administration</a><br>
    <br><a href="log_in.php">Employee_info</a><br>
    </form>
<?php
    $conn=oci_connect("hr","hr","localhost/orcl");
    $Nam = $_POST['name'];
    $Addr = $_POST['addr'];
    $Gen = $_POST['gen'];
    $B_D = $_POST['bd'];
    if( strlen($Nam)!=0 && isset($_POST['addr']) && isset($_POST['gen']) && isset($_POST['bd']) && isset($_POST['etype']) && isset($_POST['sal']) && isset($_POST['email']) && strlen($Nam)!=0  )
{
    $d = 'Doctor' ;
    $a = 'Admin' ;
    
    if($_POST['etype']==$a){
        $sql1 = "SELECT COUNT(*) FROM EMPLOYEE_INFO Where Employee_type='$a' " ;
        $id = 1000 ;
        $Etype = $a ;
    } 
    else {
        $sql1 = "SELECT COUNT(*) FROM EMPLOYEE_INFO Where Employee_type='$d' " ;
        $id = 2000 ;
        $Etype = $d ;
    }
    $output1 = oci_parse( $conn,$sql1 ) ;
    $result=oci_execute($output1); 
    
    while( ($row = oci_fetch_array($output1,OCI_BOTH)) != false ){
        $cnt_till_now = $row[0] ;
    }
    $id = $id + $cnt_till_now + 1 ;


  #  $Etype = $_POST['etype'];
    $Sal = $_POST['sal'];
    $Email = $_POST['email'];
    $Pass = $_POST['pass'];
    echo'Congrats!Your Employee ID is '.$id;
    $sql="INSERT INTO EMPLOYEE_INFO(EMPLOYEE_ID,EMPLOYEE_NAME,ADDRESS,BIRTHDATE,GENDER,EMPLOYEE_TYPE,SALARY,EMAIL,PASSWORD) VALUES ('$id','$Nam','$Addr','$B_D','$Gen','$Etype','$Sal','$Email','$Pass')";
    $temp = floor($id/1000);
    if($temp==2){
        ?>
        <form action = "Doctors_Info_Input.php" method="post">
        <input type ="SUBMIT" value = "go" >
        <input type="hidden" name = "id" value = "<?php echo $id ?>" >
        </form>
    <?php
    }
    $output=oci_parse($conn,$sql);
    $tot=oci_execute($output);
}

oci_close($conn);
?> 

</body
</html>