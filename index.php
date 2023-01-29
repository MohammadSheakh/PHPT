<?php
// ekhane amra mysql database er shathe connection korbo

    // create 3 variable 
    $server = "localhost";
    $username = "root";
    $password = "";
    $con = mysqli_connect($server, $username, $password);
    if(!$con){
        die("connection to this database failed due to " . mysql_connect_error());
    }
    echo "success connecting to the db";

    // ekhane amra form er value insert korbo ... 

        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $desc = $_POST['desc'];
    
    // query likhbo 
    $sql  = "INSERT INTO `trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name','$age', '$gender' ,
    '$email', '$phone', '$desc', current_timestamp());";

    echo $sql;
    // object operator 
    if($con->query($sql) == true){
        echo "successfully inserted"
    }else{
        echo "Error happened : $sql <br> $conn -> error"; // may be conn er error object ta access korte chacchi 
    }

    // connection close kore dite hobe 
    $con-> close();
    



?>

