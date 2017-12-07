<?php
require_once '../autoload.php';

try
{
    $user_id = $_SESSION['user']['id'];
    $checkChangePass = false;
    $sql = "select user_pass from user_login where user_id=:user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
    $result = $stmt->fetch();
    $pass = $result['user_pass'];
    if(isset($_POST['password']) && $_POST['password'] != '') {
        $pass = $_POST['password'];
        $checkChangePass = true;
    }

    $sql = "UPDATE user_login SET user_pass = :password,
        user_email = :email,user_phone = :phone
        WHERE user_id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->bindValue(':password', $_POST['password']);
    $stmt->bindValue(':email', $_POST['email']);
// use PARAM_STR although a number
    $stmt->bindValue(':phone', $_POST['phone']);

    if ($stmt->execute())
    {
        if($checkChangePass) {
            header('location: ../logout.php');
        }

        header('location:../profile.php');
        echo "Add complete";
    }

}catch (PDOException $ex){
    echo 'ERROR -> ' . $ex->getMessage();
}