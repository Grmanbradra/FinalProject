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
    <link rel="stylesheet" href="../css/from_register.css">
</head>
<body>

<div class="container">
    <div class="row main">
        <div class="panel-heading">
            <div class="panel-title text-center">
                <h1 class="title">Sing Up</h1>
                <hr />
            </div>
        </div>
        <div class="main-login main-center">
            <form method="post" action="add_user.php">

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Your Username *</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i>Username:</i></span>
                            <input type="text" class="form-control" name="username" placeholder="Enter your username"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Password*</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i>Password:</i></span>
                            <input type="password" class="form-control" name="password"  placeholder="Enter your Password"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Your Email</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i>Email:</i></span>
                            <input type="text" class="form-control" name="email"  placeholder="Enter your Email"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="username" class="cols-sm-2 control-label">Phone</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i>Phone:</i></span>
                            <input type="text" class="form-control" name="phone" placeholder="Enter your Phone"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Gender</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="radio" name="gender" value="Male"> Male
                            <input type="radio" name="gender" value="Female"> Female
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <input type="submit" class="btn btn-primary btn-lg btn-block login-button" value="Register">
                </div>
                <div class="login-register">
                    <a href="../login.php">Login</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!--<script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.js"></script>-->
</div>
</body>
</html>