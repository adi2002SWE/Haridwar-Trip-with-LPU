<?php
    $insert=false;
    if(isset($_POST['name'])){
        $server = "localhost";
        $username = "root";
        $password = "123";

        $con = mysqli_connect($server, $username, $password);

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $desc = $_POST['desc'];

        $sql= "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

        if($con->query($sql)==true){
            $insert=true;
        }
        else{
            echo "Error : $sql <br> $con->error";
        }

        $con->close();
    }    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="LPU_adm.jpg" alt="LPU"/>
    <div class="container">
        <h2>Welcome to LOVELY PROFESSIONAL UNIVERSITY Haridwar Trip Form</h2>
        <p>Enter your Details and submit this form to confirm your participation in the trip</p>
        <?php
            if($insert==true)
            echo "<p class='submitMsg'>Thanks for submiting your form. We are happy to see you in the Haridwar trip</p>";
        ?>    
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your gender">
            <input type="email" name="email" id="email" placeholder="Enter Your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone No.">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter Other Information"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>