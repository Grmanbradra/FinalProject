<?php
// Include config file
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
<div class="wrapper">
    <h2>Sign Up</h2>
    <p>Please fill this form to create an account.</p>
    <form action="" method="post">
        <div class="form-group ">
            <label>Username:<sup>*</sup></label>
            <input type="text" name="username"class="form-control">
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label>Password:<sup>*</sup></label>
            <input type="password" name="password" class="form-control">
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label>Confirm Password:<sup>*</sup></label>
            <input type="password" name="confirm_password" class="form-control">
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label>Email:<sup>*</sup></label>
            <input type="text" name="email" class="form-control">
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label>Phone:<sup>*</sup></label>
            <input type="text" name="phone" class="form-control">
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label>Gender:<sup>*</sup></label>
            <input type="radio" name="gender" value="Male"> Male
            <input type="radio" name="gender" value="Female"> Female
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
            <input type="reset" class="btn btn-default" value="Reset">
        </div>
        <p>Already have an account? <a href="../login.php">Login here</a>.</p>
    </form>
    <?php
        if ($_POST){
            $username = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $gender = $_POST["gender"];
            $status = 0;

            print_r($username);
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
                $stmt->execute();
                $max = "";

                if ($stmt->execute()) {
                    echo "Add complete";
                }
            }catch (PDOException $ex){
                echo 'ERROR -> ' . $ex->getMessage();
            }
        }
    ?>
</div>
</body>
</html>