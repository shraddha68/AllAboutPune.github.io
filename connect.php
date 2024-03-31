<?php
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Database connection
    $conn = new mysqli('localhost','root','','test');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into registration(fullname, email, message) values(?, ?, ?)");
        $stmt->bind_param("sss", $fullname, $email, $message);
        $execval = $stmt->execute();

        if($execval) {
            echo "Your Feedback Submitted Successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
        
        $stmt->close();
        $conn->close();
    }
?>