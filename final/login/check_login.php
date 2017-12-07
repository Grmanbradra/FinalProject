<?php
ob_start();
session_start();
error_reporting(1);

if ($_POST['username'] == "" || $_POST['password'] == "") {
    echo "Username AND PASSWORD Is Null";
}
try {
    require_once('config.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $db = $pdo;

    $sql = 'SELECT * FROM user_login WHERE user_name=:username and user_pass=:password';
    $stmt = $db->prepare($sql);
    $param[':username'] = $username;
    $param[':password'] = $password;
    $stmt->execute($param);

    $per = $stmt->fetch();
    $row_count = $stmt->rowCount();
    if ($row_count == 0) {
        echo "<script>alert('Password is incorrect');</script>";
        echo "<script>window.location.href='../login.php'</script>";

        exit();
    } else {
        header("location:../index.php");
        $_SESSION['user'] = [
            'name' => $per['user_name'],
            'permission' => $per['user_status']
        ];
    }
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
?>