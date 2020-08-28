<?php
    $conn=oci_connect("Arg_007","acmicpcioi","localhost/orcl");
    /*if($conn)
    {
        echo "connected\n";
    }
    else{
        echo "NOT";
    }*/

    

    $tot="SELECT * FROM EMPLOYEE_INFO";
    $output=oci_parse($conn,$tot);
    $result=oci_execute($output);
    while(($row=oci_fetch_array($output,OCI_BOTH))!=false)
    {
        echo "\xA"; 
        echo $row[0] . "\t" .  $row[1] .  "\t" . $row[2] . "\t" . $row[3] . "\t" . $row[4] . "\t" . $row[5] . "\xA" . "</br>";
        echo "\xA";
        
    }
    oci_close($conn);
?>
