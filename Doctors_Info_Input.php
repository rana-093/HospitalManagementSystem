<html>
<head><title>Hello</title></head>
<body background="hospital_5.jpg" style="background-repeat:none; " >
    <form action="Doctors_Info_Input.php" method="post">
    Degree:<br><input type="text" name="deg"><br>
    Specialization:<br><input type ="text" name = "spec" > <br>
    <input type="SUBMIT">
    </form>
    <?php
    $conn = oci_connect ("hr","hr","localhost/orcl");
    $Deg = $_POST['deg'];
    $id = $_POST['id'];
#    $id = 2010 ;
    echo $id ;
    $Spec = $_POST['spec'];
    if(strlen($Deg)!=0  && strlen($Spec)!=0){
        echo $id;
        $D = $Deg;
        $i = $id;
        $S = $Spec;
        $sql = "INSERT INTO DOCTORS (EMPLOYEE_ID,DEGREES,SPECIALIZATION) VALUES('$i','$D','$S')";
        $output = oci_parse($conn,$sql);
        $tot = oci_execute($output);
    }
    oci_close($conn);
    
    ?>
    
    
    </body>
</html>