<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {

    $user_id = $_POST['user_id'];

require_once 'connect.php';

$sql = "SELECT * FROM ticket WHERE `user_id`='$user_id' ";

    $response = mysqli_query($conn, $sql);
    $result['read'] = array();

    if (!$result)
    {
        $result["success"] = "0";
        $result["message"] = "Error!" 
        . mysqli_connect_error() 
        . "<br />" 
        . mysqli_error() 
        . "<br />" 
        . var_dump($response);

        echo json_encode($result);
        mysqli_close($conn);
    }
    else {
        while($row = $response->fetch_assoc())
        {
            $result['read'][] = $row;
        }
        
        $result["success"] = "1";
        $result["message"] = "Success";

        echo json_encode($result);
        mysqli_close($conn);
    }
}
?>