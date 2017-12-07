<?php
// Include config file
require_once '../config/connectdb.php';

if ($_POST){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $status = 0;

//    print_r($username);
    try{
        $sql = "INSERT INTO user_login
						  (user_name,user_pass,
						   user_email,user_phone,user_status,
						   user_gender)
					       VALUES(:user_name,:user_pass,:user_email,:user_phone,:user_status,:user_gender)";
        $db = $pdo;
        $stmt = $db->prepare($sql);
//                $stmt->bindParam(':id', "");
        $stmt->bindParam(':user_name', $username);
        $stmt->bindParam(':user_pass', $password);
        $stmt->bindParam(':user_email', $email);
        $stmt->bindParam(':user_phone', $phone);
        $stmt->bindParam(':user_status', $status);
        $stmt->bindParam(':user_gender', $gender);
        $max = "";

        if ($stmt->execute()) {
            header('location:../login.php');
            echo "Add complete";
        }
    }catch (PDOException $ex){
        echo 'ERROR -> ' . $ex->getMessage();
    }
}
?>