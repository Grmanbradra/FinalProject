<?php

if (isset($_POST['submit'])) {

    try {
        $id_ref_cate = $_POST['id_ref_cate_old'];
        $id_degree = $_POST['id_degree_old'];


        if($id_ref_cate != $_POST['id_ref_cate']) {
            $id_ref_cate = $_POST['id_ref_cate'];
        }
        if($id_degree != $_POST['id_degree']) {
            $id_degree = $_POST['id_degree'];
        }


        // check duplicate id_file
        $sql = "SELECT id_file FROM ref_file WHERE id_file=:id_file";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id_file', $id);
        $stmt->execute();

        if($stmt->rowCount() == 1) {
            // duplicate : update
            $sql = "UPDATE ref_file SET id_ref_cate=:id_ref_cate, id_degree=:id_degree, id_user=:id_user WHERE id_file=:id_file";
        } else {
            // not duplicate : insert
            $sql = "INSERT INTO ref_file(id_file, id_ref_cate, id_degree, id_user) 
                VALUES (:id_file, :id_ref_cate, :id_degree, :id_user)";
        }

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id_file', $id);
        $stmt->bindValue(':id_ref_cate', $id_ref_cate);
        $stmt->bindValue(':id_degree', $id_degree);
        $stmt->bindValue(':id_user', $_SESSION['user']['id']);

        if($stmt->execute()) {
            // success
            echo "<script>swal('Success!', 'Update record successfully', 'success')</script>";
//            $_SESSION['notification']['success'] = "New record created successfully";

            $see_path = $conn->prepare("SELECT * FROM file_data WHERE id_file=:id");
            $see_path->bindValue(':id', $id);
            $see_path->execute();
            $data_file = $see_path->fetch();

            $see_cate = $conn->prepare("SELECT * FROM ref_category 
                        INNER JOIN main_category ON ref_category.digit_main = main_category.digit_main 
                        JOIN sub_category ON ref_category.digit_sub = sub_category.digit_sub
                        WHERE ref_category.id_ref_cate = :id_ref");
            $see_cate->bindValue(':id_ref',$id_ref_cate);
            $see_cate->execute();
            $data_cate = $see_cate->fetch();

            $see_degree = $conn->prepare("SELECT * FROM degree WHERE id_degree=:id");
            $see_degree->bindValue(':id',$id_degree);
            $see_degree->execute();
            $data_degree = $see_degree->fetch();

            $name_file = basename($data_file['path_file']);
            $ext = pathinfo($name_file)['extension'];


            $ds = DIRECTORY_SEPARATOR;
            $dir = dirname(dirname(__DIR__));
            $directory = $dir . $ds . 'box';
            $relativePath = 'box' . $ds . $data_cate['name_main'] . $ds . $data_cate['name_sub'] . $ds . $data_degree["name_degree"] . $ds . basename($data_file['name_file']) . '.' . $ext;

            // main
            $directory .= $ds . $data_cate['name_main'];
            if(!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }
            // sub
            $directory .= $ds . $data_cate['name_sub'];
            if(!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }
            // degree
            $directory .= $ds . $data_degree["name_degree"];
            if(!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            $old_path = $dir . $ds . str_replace('/', '\\', $data_file['path_file']);
            $new_path = $directory . $ds . basename($data_file['name_file']) . '.' . $ext;

            rename($old_path, $new_path);

            //Update DB table 'file_data' into path file.
            $upPath = $conn->prepare("UPDATE file_data SET path_file = :path WHERE id_file = :id_old");
            $upPath->bindValue(':id_old', $id);
            $upPath->bindValue(':path', $relativePath);
            $upPath->execute();
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

    echo '<script>setTimeout(function(){window.location.href = "folders.php"}, 1000)</script>';
}