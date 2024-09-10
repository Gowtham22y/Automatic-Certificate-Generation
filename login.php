<?php
session_start();
if (isset($_POST['save'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $con = mysqli_connect("localhost", "root", "", "bio_data");

    $sql = "SELECT * FROM student WHERE email = '$email'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['name']; 
            $_SESSION['user_id'] = $user['id']; 

            if ($user['quiz_completed'] == 1) {
                $_SESSION['stars'] = $user['stars_earned'];
                header('Location: certificate.php');
                exit();
            } else {
                header('Location: quiz.php');
                exit();
            }
        } else {
            $error = "Incorrect email or password.";
        }
    } else {
        $error = "Incorrect email or password.";
    }
    mysqli_close($con);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<h2 class="text">Login Form</h2>

    <form method="POST" action="">
        <div class="form">
            <div class="input">
                <div class="title"><label>Email</label></div>
                <div class="field"><input id="email" type="text" name="email"></div>
            </div>

            <div class="input">
                <div class="title"><label>Password</label></div>
                <div class="field"><input id="password" type="password" name="password"></div>
            </div>

            <?php if (isset($error)): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>

            <div class="input">
                <div class="button"><input class="but" type="submit" name="save" value="submit" /></div>
            </div>
        </div>
    </form>

    <div>
        <div class="login">
            Don't have an account? <a href="register.php">Create One</a>
        </div>
    </div>
</body>
</html>
