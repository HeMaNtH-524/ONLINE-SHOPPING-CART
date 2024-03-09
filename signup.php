<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DataBase";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    echo "database was not connected";
}

function modified_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['submit'])) {
    $Name = modified_input($_POST['username']);
    $email = modified_input($_POST['useremail']);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if (!preg_match("/^[a-zA-Z ]+$/", $Name)) {
        echo "<script>alert('Invalid name format'); 
                window.location='sign.html';
                </script>";
        exit();
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format');
             window.location='sign.html';
             </script>";
        exit();
    }
    if (strlen($password) < 8) {
        echo "<script>alert('Password must be at least 8 characters long.');
             window.location='sign.html';</script>";
        exit();
    }
    if (!preg_match($password, $cpassword)) {
        echo "<script>alert('password and confirm passwords are mismatching');
         window.location='sign.html';
         </script>";
        exit();
    }

    $check = "SELECT * FROM form WHERE email = ?";
    $stmt = mysqli_prepare($conn, $check);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        echo "<script>alert('You have already registered. Kindly sign in.');
             window.location='bootstrap.html';
             </script>";
    } else {
        $insert_query = "INSERT INTO form (Name, email, password,cpassword) VALUES (?, ?, ?, ?)";
        $stmt_insert = mysqli_prepare($conn, $insert_query);
        mysqli_stmt_bind_param($stmt_insert, "ssss", $Name, $email, $password,$cpassword);

        if (mysqli_stmt_execute($stmt_insert)) {
            echo "<script>
                alert('You are successfully registered!');
                window.location='bootstrap.html';
            </script>";
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt_insert);
    }

    mysqli_stmt_close($stmt);
}
?>