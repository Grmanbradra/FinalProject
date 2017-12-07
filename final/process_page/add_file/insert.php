<?php

if (isset($_POST['submit'])) {

    try {

        // upload file
        $path = "";
        if(isset($_FILES['book_file'])) {
            $target_dir = "box/others/";
            $name = basename($_FILES["book_file"]["name"]);
            $target_file = __DIR__."/../../" . $target_dir . $name;

            $fileType = pathinfo($target_file,PATHINFO_EXTENSION);

            if($fileType == 'pdf') {
                if(move_uploaded_file($_FILES["book_file"]["tmp_name"], $target_file)) {
                    echo '<br>' . 'success';
                    $path = $target_dir . $name;
                }
            }

        }

        $stmt = $conn->prepare("INSERT INTO file_data (name_file, author_file, year_file, path_file) VALUES (:name, :author, :year, :path)");
        $stmt->bindValue(':name', $_POST['book_name']);
        $stmt->bindValue(':author', $_POST['book_author']);
        $stmt->bindValue(':year', $_POST['book_year']);
        $stmt->bindValue(':path', $path);
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

    echo '<script>setTimeout(function(){window.location.href = "add_file.php"}, 1000)</script>';
}