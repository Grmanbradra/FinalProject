<?php

if (isset($_POST['submit'])) {


    try {
        $stmt = $conn->prepare("UPDATE categories_water SET water_id = :id, water_name = :name, water_range = :range WHERE water_id = :id_old");
        $stmt->bindValue(':id_old', $id);
        $stmt->bindValue(':id', $_POST['water_id']);
        $stmt->bindValue(':name', $_POST['water_name']);
        $stmt->bindValue(':range', $_POST['water_rang']);
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