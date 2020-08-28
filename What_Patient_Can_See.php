<html>
<head><title>Hello</title></head>
<body >
    <form action="All_Admission_ID.php" method="post"/>
    Patient_ID:<br><input type="text" name="ID"><br>
    <!--Password:<br><input type = "text" name ="pass"><br> -->
    <input type = "SUBMIT" value ="Show all admission id against this patient id"> <br>
    <input type = "hidden" name = "id" value = <?php echo $ID ?> >
   <!-- Date_Of_Leave:<br><input type="text" name ="DOL"><br> -->
<!--    Bed_ID:<br><input type = "text" name = "BID"><br>
    <!--Total_Bill_So_Fare:<br><input type ="text" name = "TBSF"><br>
    <input type="SUBMIT">
    <!--<br><a href="Administration.php">Go To Administration</a><br>
    <br><a href="log_in.php">Employee_info</a><br> -->
    </form>
    
</body
</html>
