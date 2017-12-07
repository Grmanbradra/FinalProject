<?php

if (isset($_POST['submit'])) {


    try {
        $stmt = $conn->prepare("UPDATE main_category SET  name_main = :name WHERE  digit_main= :id_old");
        $stmt->bindValue(':id_old', $id);
        $stmt->bindValue(':name', $_POST['name_main']);
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

    echo '<script>setTimeout(function(){window.location.href = "manage_main_cate.php"}, 1000)</script>';
}