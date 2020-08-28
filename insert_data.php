<html>
<head><title>Oracle demo</title></head>
<body>
    <form action="insert_data.php" method="post">
    ID: <input type="text" name="id"><br>
    Name: <input type="text" name="name"><br>
    Username: <input type="text" name="uname"><br>
    Password: <input type="text" name="pass"><br>
        <input type="submit">
    </form>
	<?php 
	$conn=oci_connect("project","pass","localhost/nas");
    $id=$un=$n=$p="";
    //$show= false;
    if(isset($_POST['uname']) && isset($_POST['pass']) && isset($_POST['id']) && isset($_POST['name']))
    {
        $un=$_POST['uname'];
        $p=$_POST['pass'];
        $n=$_POST['name'];
        $id=$_POST['id'];
        //$show=true;
        //echo $p;
    }
    
    $query="INSERT INTO PERSON (ID,NAME,USERNAME, PASSWORD) VALUES
                    ('$id','$n','$un', '$p')";
    $stmnt=oci_parse($conn,$query);
    $result=oci_execute($stmnt); 
    
    

oci_close($conn);
?>
    
    

</body>
</html>
