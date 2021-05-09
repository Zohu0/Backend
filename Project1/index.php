<?php
$insert = false;
if(isset($_POST['name'])){
    // Set Connection Varaiable
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create A Database Connection 
    $con = mysqli_connect($server, $username, $password);

    // Check For Connection Success
    if(!$con){
        die("Connection To This Database Failed Due To" . mysqli_connect_error());
    }
    // echo "Success Connected To db";

    // Collect Post Variables 
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone']; 
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `trip`.`table` ( `name`, `age`, `gender`, `email`, `phone`, `desc`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    // echo $sql;

    // Execute The Query 
    if($con->query($sql) == true){
        // echo "Succesfully Inserted";

        // Flag For Successful Insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close The Database Connection
    $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Travel Form</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="bg1.jpg" alt="Error Loading Image">
    <div class="container">
        <h1>Welcome To Al-Falah University Manali Trip Form</h1>
        <p>Enter Your Details And Submit This Form To Confirm Your Participation In The Trip</p>
        <?php
        if($insert==true){
        echo "<p class='submitmsg'>Thanks For Submitting Your Form. We Are Happy To See You Joining Us For Manali Trip</p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
            <input type="email" name="email" id="email" placeholder="Enter Your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone">
            <textarea name="desc" id="desc" cols="30" rows="10"
                placeholder="Enter Any Other Information Here"></textarea>
            <button class="btn">Submit</button>

        </form>
    </div>
    
</body>

</html>