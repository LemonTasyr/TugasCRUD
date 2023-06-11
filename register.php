<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Add admin</title>
</head>

<body>
    <div class="container">
        <div class="add-form">
            <a href="index.php" style="text-decoration: none">Back</a>

            <form action="register.php" method="post" name="form1" enctype="multipart/form-data">
                <table border="0">
                    <tr>
                        <td>Username</td>
                        <td><input type="text" required name="username"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" required name="password"></td>
                    </tr>
                    <tr>
                        <td>Confirm Password</td>
                        <td><input type="password" required name="confirm_password"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" class='button-submit' name="submit" value="Sign Up"></td>
                    </tr>

                </table>
            </form>
            <?php
            require "config.php";
            if (isset($_POST['submit'])) {

                $username = $_POST['username'];
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];
                $password_enkripsi = md5($password);

                if ($password == $confirm_password) {
                    $result = mysqli_query($mysqli, "INSERT INTO admin(username,password) VALUES('$username','$password_enkripsi')");
                    header("Location: login.php");
                } else {
                    $error = true;
                }
            }
            ?>
        </div>
    </div>


</body>

</html>