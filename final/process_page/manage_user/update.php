<?php

if (isset($_POST['submit'])) {


    try {
        $stmt = $conn->prepare("UPDATE user_login SET user_name = :name, user_pass = :pass
  ,user_email = :email,user_phone = :phone,user_status = :status,user_gender = :gender WHERE user_id = :id_old");
        $stmt->bindValue(':id_old', $id);
        $stmt->bindValue(':name', $_POST['user_name']);
        $stmt->bindValue(':pass', $_POST['user_pass']);
        $stmt->bindValue(':email', $_POST['user_email']);
        $stmt->bindValue(':phone', $_POST['user_phone']);
        $stmt->bindValue(':status', $_POST['user_status']);
        $stmt->bindValue(':gender', $_POST['user_gender']);
        if($stmt->execute()) {
            // success
            echo "<script>swal('Success!', 'Update record successfully', 'success')</script>";
//            $_SESSION['notification']['success'] = "New record created successfully";
        } else {
            // fail
//            $_SESSION['notification']['warning'] = "Insert Fail!";
            echo "<script>swal('Warning!', 'Update Fail!', 'warning')</script>";
        }
    }
    catch(PDOException $e)
    {
        echo "-- error update data --" . "<br> -> " . $e->getMessage();
//        $_SESSION['notification']['error'] = $e->getMessage();
        echo "<script>swal('Error!', ".$e->getMessage().", 'error')</script>";
    }

    $conn = null;

    echo '<script>setTimeout(function(){window.location.href = "manage_user.php"}, 1000)</script>';
}