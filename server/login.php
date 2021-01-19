<?php

    //DB Connection variaables
    $HOST_NAME = "localhost";
    $USER_NAME = "root";
    $PASSWORD = "";
    $DATABASE = "reminder_db";

    session_start();

    //Connect to DB
    $con = mysqli_connect($HOST_NAME, $USER_NAME, $PASSWORD, $DATABASE );

    //Get input field values
    $uname = $_POST["username"];
    $pword = $_POST["password"];
    $utype = $_POST["user_type"] == "st" ? "student" : "teacher" ;

    if(isset($uname) && isset($pword) && isset($utype) ){
        $username = mysqli_real_escape_string($con, $uname);
        $password = mysqli_real_escape_string($con, $pword);
        $user_type = mysqli_real_escape_string($con, $utype);

        $sql = "SELECT * FROM users WHERE username = '" .$username. "' AND password = '" .$password. "' AND user_type = '" .$user_type. "'";
        $result = mysqli_query($con, $sql);
        $rows = mysqli_num_rows($result);

        if($rows > 0){
            $data = mysqli_fetch_array($result);
            $_SESSION["username"] = $data["username"];
            $_SESSION["user_type"] = $data["user_type"];
            $_SESSION["fname"] = $data["first_name"];
            $_SESSION["lname"] = $data["last_name"];
            $_SESSION["img"] = $data["avatar"];
            echo "1";
        }
    }


?>