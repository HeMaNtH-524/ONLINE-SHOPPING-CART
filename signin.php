<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "DataBase";

    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
        echo "database was not connected";
    }
    else{
        echo "database was connected";
    }
        $name = $_POST['username'];
        $email = $_POST['useremail'];
        $password = $_POST['userpassword'];
        $sql = "SELECT * FROM Details WHERE Email = '$email';";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_num_rows($result);
        echo $row;
        if($row>0){
                echo "<script>alert('username already exist'); 
                window.location='sign.html';
                </script>";
        }
        else{
            $sql = "INSERT INTO Details VALUES('$name','$email','$password');";
            $result = mysqli_query($conn,$sql);
            if($result){
                    header("Location:bootstrap.html");
                    exit();
            }   
            else{
                echo "<script>alert('Invalid Details');</script>";
                header("Location:sign.html");
            }
        }
?>
