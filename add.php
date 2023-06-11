<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Add Users</title>
</head>

<body>
    <div class="container">
        <div class="add-form">
            <a href="index.php" style="text-decoration: none">Back</a>

            <form action="add.php" method="post" name="form1" enctype="multipart/form-data">
                <table border="0">
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td>Confirm Password</td>
                        <td><input type="password" name="confirm_password"></td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td><input type="file" name="image"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" class='button-submit' name="submit" value="Add"></td>
                    </tr>

                </table>
            </form>
            <?php
            require "config.php";
            if (isset($_POST['submit'])) {

                $target_dir = "uploads/";
                $target_file = $target_dir . $_FILES["image"]["name"];

                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

                $name = $_POST['name'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];
                $password_enkripsi = md5($password);
                $image = $_FILES['image']['name'];

                if ($password == $confirm_password) {
                    $result = mysqli_query($mysqli, "INSERT INTO user(name,username,password,image) VALUES('$name','$username','$password_enkripsi','$image')");

                    echo "User added successfully. <a href='index.php'>View Users</a>";
                } else {
                    $error = true;
                }
            }
            ?>
        </div>
    </div>


</body>

</html>