<?php

try {

    // sql to delete a record
    $sql = "DELETE FROM categories_water WHERE water_id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $id);

    if($stmt->execute()) {
        // success
        echo "<script>swal('Success!', 'Record deleted successfully', 'success')</script>";
//            $_SESSION['notification']['success'] = "New record created successfully";
    } else {
        // fail
//            $_SESSION['notification']['warning'] = "Insert Fail!";
        echo "<script>swal('Warning!', 'Record deleted Fail!', 'warning')</script>";
    }

}
catch(PDOException $e)
{
    echo "-- Record deleted --" . "<br> ->" . $e->getMessage();
}

$conn = null;
echo '<script>setTimeout(function(){window.location.href = "manage_user.php"}, 1000)</script>';