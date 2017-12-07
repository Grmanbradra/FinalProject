<?php

if (isset($_POST['submit'])) {

    try {
        $stmt = $conn->prepare("INSERT INTO key_degree (keyword_degree, id_degree) VALUES (:keyword, :degree)");
        $stmt->bindValue(':keyword', $_POST['keyword_degree']);
        $stmt->bindValue(':degree', $_POST['id_degree']);
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