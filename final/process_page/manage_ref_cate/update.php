<?php

if (isset($_POST['submit'])) {


    try {
        $stmt = $conn->prepare("UPDATE ref_category SET digit_main=:digit_main, digit_sub=:digit_sub, id_key=:id_key WHERE id_ref_cate = :id_old");
        $stmt->bindValue(':id_old', $id);
        $stmt->bindValue(':digit_main', $_POST['main_category']);
        $stmt->bindValue(':digit_sub', $_POST['sub_category']);
        $stmt->bindValue(':id_key', $_POST['key_category']);
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

    echo '<script>setTimeout(function(){window.location.href = "manage_ref_cate.php"}, 1000)</script>';
}