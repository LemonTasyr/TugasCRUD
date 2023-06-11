<?php
include_once("config.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_enkripsi = md5($password);
    $image = $_POST['image'];

    $result = mysqli_query($mysqli, "UPDATE user SET name='$name',username='$username',password='$password_enkripsi',image='$image' WHERE id='$id'");

    header("Location: index.php");
}
?>
<?php
$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM user WHERE id='$id'");

while ($user_data = mysqli_fetch_array($result)) {
    $name = $user_data['name'];
    $username = $user_data['username'];
    $password = $user_data['password'];
    $image = $user_data['image'];
}
// var_dump($name);
?>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Edit Users</title>
</head>

<body>
   <div class="container">
        <div class="add-form">
        <a href="index.php" style="text-decoration: none">Go to Home</a>

    <form action="edit.php" method="post" name="form1" enctype="multipart/form-data">
        <table border="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?= $name; ?>"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="<?= $username; ?>"></td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input type="file" name="image"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit"  class='button-submit' name="update" value="Update"></td>
                <input type="hidden" name="id" value="<?= $id ?>"
            </tr>
        </table>
    </form>
        </div>
   </div>

</body>

</html>