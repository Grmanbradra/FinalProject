<?php

if (isset($_POST['submit'])) {

    try {
        $stmt = $conn->prepare("INSERT INTO ref_file(id_ref_cate, id_degree, id_user) 
                VALUES (:id_ref_cate, :id_degree, :id_user)");
        $stmt->bindValue(':id_ref_cate', $_POST['water_id']);
        $stmt->bindValue(':id_degree', $_POST['water_name']);
        $stmt->bindValue(':id_user', $_POST['water_rang']);
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

    echo '<script>setTimeout(function(){window.location.href = "add_file.php"}, 1000)</script>';
}