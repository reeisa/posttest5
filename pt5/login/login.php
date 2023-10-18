<?php
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $admin_username = 'admin';
    $admin_password = '123';

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['login'] = true;
        header('Location: ../crud/read.php');
        exit;
    } else {
        echo '<script>
            alert("incorrect username or password.");
        </script>';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>admin login</title>
    <link rel="stylesheet" href="../style/login.css">
    <!-- hanya untuk icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>

<body>
    <div class="login-container">
        <h1>admin page</h1>
        <hr> <br>
        <form action="" method="post">
        <div class="input-icon">
            <i class="fa-solid fa-at"></i>
            <input type="text" id="username" name="username" placeholder="Username" required>
        </div>
            <div class="input-icon">
                <i class="fa-solid fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" name="login">log in</button>
        </form>
    </div>
</body>

</html>