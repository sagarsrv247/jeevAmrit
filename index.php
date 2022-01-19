<?php
$insert=false;
if(isset($_POST['name'])){

   //Set connection variable
    $server = "localhost";
    $username="root";
    $password="";

    //create a database connection
    $con = mysqli_connect($server, $username, $password);
    
    //Check for connection success
    if(!$con)
    {
        die("Connection to this database failer due to ". mysqli_connect_error());
    }
    //echo "Success connecting to the db";
    //Collect post variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $bloodgroup = $_POST['bloodgroup'];
    $desc = $_POST['desc'];


    $sql ="INSERT INTO `bloodbank`.`data` (`name`, `email`, `phone`, `age`, `gender`, `bloodgroup`, `morbidities`, `dt`) VALUES ('$name', '$email', '$email', '$age', '$gender', '$bloodgroup', '$desc', current_timestamp());";
    //echo $sql;
    //Execute the query

    if($con->query($sql)==true){
      //  echo "Successfully inserted";

      //Flag for successfull insertion
      $insert=true;
    }
    else{
        echo "Error: $sql <br> $con->error";
        
    }
    //Close the database connection
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JeevAmrit Blood Bank</title>
    <link href="https://fonts.googleapis.com/css2?family=Luxurious+Roman&family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <img class="bg" src="bg.jpg" alt="JeevAmrit">
    <div class="container">
        <h1>Welcome to JeevAmrit Blood Bank donor's form</h1>
        <p>Please enter the donor's details</p>
        <?php
        if($insert == true)
        {
         echo "<p class='submitMsg'>Thanks for submitting your form! We are happy to see you joining the cause.  </p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="email" name="email" id="email" placeholder="Enter your email address">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="text" name="bloodgroup" id="bloodgroup" placeholder="Enter your blood group">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any past morbidities"></textarea>
            <button class="btn">Submit</button>
            
        </form>
    </div>
    <script src="index.js">

    </script>
    <!-- -->
</body>
</html>