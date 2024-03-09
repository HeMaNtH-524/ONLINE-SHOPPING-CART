<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "DataBase";

    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
        echo "database was not connected";
    }
    else{
        echo "";
    }
        $email = $_POST['useremail'];
        $password = $_POST['userpassword'];
        $sql = "SELECT * FROM Details WHERE Email = '$email';";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_num_rows($result);
        if($row > 0){
            while($data = mysqli_fetch_assoc($result)){
              if($data['Password'] === $password){
            	header("Location:bootstrap1.html");
	        exit();
              }
	      else{
	    	echo "<script>alert('Incorrect Password'); 
                window.location='bootstrap.html';
                </script>";
	      }  
            }     	
        }
        else{
            echo "<script>alert('You do not have account kindly please sign up'); 
                window.location='sign.html';
                </script>";
        }        
?>
