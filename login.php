<?php
require "config.php";
session_start();
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password_enkripsi = md5($password);

    if (!empty($username) && !empty($password)) {
        // var_dump("login");
        // die;
        $result = mysqli_query($mysqli, "SELECT * from admin WHERE username='$username' and password='$password_enkripsi'");
        if ($result->num_rows == 1) {
            $_SESSION["login"] = "true";
            header("Location: index.php");
        } else {
            $error = "Username Atau Password Salah";
        }
    } else {
        $error = "Form Wajib Diisi";
    }
}

?>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="add-form">
            <a href="index.php" style="text-decoration: none">Back</a>

            <form action="" method="post" name="form1" enctype="multipart/form-data">
                <table border="0">
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password"></td>
                    </tr>

                    <?php if (isset($error)) : ?>
                        <tr>
                            <td colspan="2">
                                <p><?= $error ?></p>
                            </td>

                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td colspan="2"><input type="submit" class='button-submit' name="submit" value="Login"></td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <p>Belum punya akun? <a href="register.php" style="font-weight: 600; text-decoration:none ;color: #0062cc;">Daftar</a></p>

                        </td>
                    </tr>

                </table>
            </form>
        </div>
    </div>


</body>

</html>