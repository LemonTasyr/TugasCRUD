<?php
include_once("config.php");
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}

$result = mysqli_query($mysqli, "SELECT * FROM user");
?>

<html>

<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="containertable">
        <div class="btn">
            <a class="button-add" href="add.php">Add New User</a>
            <a class="button-add" href="logout.php">Log Out</a>
        </div>

        <table cellspacing="0">

            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Image</th>
                <th>Keterangan</th>
            </tr>
            <?php while ($user_data = mysqli_fetch_array($result)) : ?>
                <tr>
                    <td><?= $user_data["id"] ?></td>
                    <td><?= $user_data["name"] ?></td>
                    <td><img style='width:50px;' src="./uploads/<?= $user_data["image"] ?>" width='50px' alt=''></td>
                    <td style='align-items:center'>
                        <a href='edit.php?id= <?= $user_data["id"] ?>'><button class='button'>Edit</button></a>
                        <a href='delete.php?id=<?= $user_data["id"] ?>'><button class='button'>Delete</button></a>
                        <a href='detail.php?id=<?= $user_data["id"] ?>'><button class='button'>Detail</button></a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

</body>

</html>