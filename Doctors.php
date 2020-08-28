<html>
<head><title>Hello</title></head>
<body >
    
    <?php $id = $_POST['id'] ; ?>
     <form action = "future_operations_(doctor).php" method="post">
    <input type = "SUBMIT" value = "Show future operations">
    <input type="hidden" name="id" value= "<?php echo $id ; ?>" >
    </form>
    <form action = "Past_Operation_Details(Doctors).php" method="post" >
    <input type = "SUBMIT" value = "Show Past Operations" >
    <input type = "hidden" name = "id" value ="<?php echo $id; ?>" >
    </form>
    <form action="Patients_Under_Doctor.php" method="post">
    <input type="SUBMIT" value = "Show Patients Under My Supervision" >
    <input type="hidden"  name = "id" value="<?php echo $id; ?>" >    
    </form>
    
</body
</html>
