<?php

if (isset($_POST['submit'])) {


    try {
        $stmt = $conn->prepare("UPDATE key_degree SET keyword_degree = :keyword_degree, id_degree = :id_degree WHERE id_key_degree = :id_old");
        $stmt->bindValue(':id_old', $id);
        $stmt->bindValue(':keyword_degree', $_POST['keyword_degree']);
        $stmt->bindValue(':id_degree', $_POST['id_degree']);
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

    echo '<script>setTimeout(function(){window.location.href = "manage_key_degree.php"}, 1000)</script>';
}