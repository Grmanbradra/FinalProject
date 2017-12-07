<?php

if (isset($_POST['submit'])) {

    try {
        $stmt = $conn->prepare("INSERT INTO categories_water (water_id, water_name, water_range) VALUES (:id, :name, :range)");
        $stmt->bindValue(':id', $_POST['water_id']);
        $stmt->bindValue(':name', $_POST['water_name']);
        $stmt->bindValue(':range', $_POST['water_rang']);
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

    echo '<script>setTimeout(function(){window.location.href = "manage_key_degree.php"}, 1000)</script>';
}