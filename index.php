<!-- $insert = false; -->
<!-- https://www.youtube.com/watch?v=1SnPKhCdlsU -->
<?php
// ekhane amra mysql database er shathe connection korbo

    // create 3 variable // connection variable
    $insert = false;
    $server = "localhost";
    $username = "root";
    $password = "";

    // create a database connection 
    $con = mysqli_connect($server, $username, $password);

    // check for connection success
    if(!$con){
        die("connection to this database failed due to " . mysql_connect_error());
    }
    ///echo "success connecting to the db";

    // ekhane amra form er value insert korbo ... 

    // collect post variables
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $desc = $_POST['desc'];
    
    // query likhbo 
    $sql  = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name','$age', '$gender' ,
    '$email', '$phone', '$desc', current_timestamp());";

     /// echo $sql;        // showing output .. 
    // object operator  // execute the query
    if($con->query($sql) == true){
        //echo "successfully inserted";

        // Flag for successfull insertion 
        $insert = true;
    }else{
        echo "Error happened : $sql <br> $conn -> error"; // may be conn er error object ta access korte chacchi 
    }

    // connection close kore dite hobe 
    $con-> close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="bg.jpg" alt="picture">
    <div class="container">

        <h1>Welcome to Trip Form</h1>
        <p>Enter Details and submit this form</p>
        <?php
            if($insert == true){
                echo"<p>thanks for submitting...</p>";
            }
            
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name ">
            <input type="text" name="age" id="age" placeholder="Enter your age ">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender ">
            <input type="email" name="email" id="email" placeholder="Enter your email ">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone ">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Write Description..."></textarea>
            <button class="btn ">Submit</button>
            <button class="btn">Reset</button>
        </form>
    </div>
    <script src="index.js"></script>
    <!-- INSERT INTO `trip` (`Sno`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('1', 'test name', '23',
    'male', 'this@this.com', '99999', 'this is other text box', current_timestamp()); -->
</body>

</html>

