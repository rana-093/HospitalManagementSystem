<html>
<head><title>Hello</title></head>
<body >
    <form action="log_in.php" method="post"/>
    ID:<br><input type="text" name="ID"><br>
    Password:<br><input type = "text" name ="pass"><br>
    <input type = "SUBMIT"><br>
   <!-- Date_Of_Leave:<br><input type="text" name ="DOL"><br> -->
<!--    Bed_ID:<br><input type = "text" name = "BID"><br>
    <!--Total_Bill_So_Fare:<br><input type ="text" name = "TBSF"><br>
    <input type="SUBMIT">
    <!--<br><a href="Administration.php">Go To Administration</a><br>
    <br><a href="log_in.php">Employee_info</a><br> -->
    </form>
<?php
    $conn=oci_connect("Arg_007","acmicpcioi","localhost/orcl");
    if(isset($_POST['ID']) && isset($_POST['pass'])){
    $i = $_POST['ID'] ;
    $p = $_POST['pass'] ;
    $sql1 = "SELECT COUNT(*) FROM EMPLOYEE_INFO WHERE EMPLOYEE_ID = '$i' AND PASSWORD = '$p'" ;
    $output=oci_parse($conn,$sql1);
    $result=oci_execute($output);
    $cnt = -1;
    while( ($row = oci_fetch_array($output,OCI_BOTH))!= false){
        $cnt = $row[0];
    }
    if($cnt == 0){
        echo 'Wrong ID or PASSWORD';
    }
    else if($cnt==1){
        #Doctors ID begin with 1
        #Admins ID begin with 2
        $temp = FLOOR($i/1000);
        echo 'Log In Successful';
        if($temp == 2){
            ?>
            <form action = "Doctors.php" method = "post" />
            <input type = "SUBMIT" value = "Go to Doctors Page"><br>
            <input type="hidden" name="id" value= "<?php echo $i ; ?>" >

    <?php
        }
        else if($temp == 1){
        ?>
        <form action = "Administration.php" method = "post" />
        <input type = "SUBMIT" value = "Add Everything U Need"><br>
    <?php
    }
    }
    }
    
oci_close($conn);
?> 
    
</body
</html>
