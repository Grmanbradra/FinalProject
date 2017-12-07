<?php

$status = 0;

if (isset($_POST['submit'])) {

    try {
        $stmt = $conn->prepare("INSERT INTO user_login (user_name, user_pass,user_email,user_phone,
    user_status,user_gender) VALUES (:name, :pass, :email, :phone, :status, :gender)");
        $stmt->bindValue(':name', $_POST['user_name']);
        $stmt->bindValue(':pass', $_POST['user_pass']);
        $stmt->bindValue(':email', $_POST['user_email']);
        $stmt->bindValue(':phone', $_POST['user_phone']);
        $stmt->bindValue(':status', $status);
        $stmt->bindValue(':gender', $_POST['user_gender']);
        if($stmt->execute()) {
            // success
            echo "<script>swal('Success!', 'New record created successfully', 'success')</script>";
//            $_SESSION['notification']['success'] = "New record created successfully";
        } else {
            // fail
//            $_SESSION['notification']['warning'] = "Insert Fail!";
            echo "<script>swal('Warning!', 'Insert Fail!', 'warning')</script>";
        }
    }
    catch(PDOException $e)
    {
        echo "-- error insert data --" . "<br> -> " . $e->getMessage();
//        $_SESSION['notification']['error'] = $e->getMessage();
        echo "<script>swal('Error!', ".$e->getMessage().", 'error')</script>";
    }

    $conn = null;

    echo '<script>setTimeout(function(){window.location.href = "manage_user.php"}, 1000)</script>';
}