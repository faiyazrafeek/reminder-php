<?php 

    //DB Connection variaables
    $HOST_NAME = "localhost";
    $USER_NAME = "root";
    $PASSWORD = "";
    $DATABASE = "reminder_db";

    session_start();

    //Connect to DB
    $con = mysqli_connect($HOST_NAME, $USER_NAME, $PASSWORD, $DATABASE );

    if(isset($_GET['assignment'])){
        $sql = "SELECT * FROM assignment";
        $result = mysqli_query($con, $sql);
        $rows = mysqli_num_rows($result);
        $data = array();
        if($rows > 0){            
            while($row = $result->fetch_assoc()) {
                $d = array();
                $d['assignment_no'] = $row['title']."";
                array_push($data,$d);
            }
            
            echo "".json_encode($data);
        }
    
    // Free result set
    $result -> free_result();		
    
    }

?>
