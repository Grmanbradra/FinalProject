<?php

if (isset($_POST['submit'])) {

    try {
        $stmt = $conn->prepare("INSERT INTO sub_category (name_sub, digit_main) VALUES (:name, :main)");
        $stmt->bindValue(':name', $_POST['name_sub']);
        $stmt->bindValue(':main', $_POST['digit_main']);
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

    echo '<script>setTimeout(function(){window.location.href = "manage_sub_cate.php"}, 1000)</script>';
}