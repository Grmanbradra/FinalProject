<?php

try {

    // select delete file
    $sql = "SELECT path_file FROM file_data WHERE id_file=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $id);
    $check = false;
    if($stmt->execute()) {
        $data = $stmt->fetch();

        $directory = dirname(dirname(__DIR__)) . '/'. $data['path_file'];

        echo '<pre>';
        echo $directory . "<br>";

        if(file_exists($directory)) {
            echo 'file_exists';
            if(unlink($directory)) {
                echo 'remove file success';
                $check = true;
            }
        } else {
            $check = true;
        }

    }


    // sql to delete a record
    $sql = "DELETE FROM file_data WHERE id_file=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $id);

    $sql = "DELETE FROM ref_file WHERE id_file=:id";
    $stmt2 = $conn->prepare($sql);
    $stmt2->bindValue(':id', $id);

    if($stmt2->execute() && $check && $stmt->execute()) {
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
echo '<script>setTimeout(function(){window.location.href = "folders.php"}, 1000)</script>';