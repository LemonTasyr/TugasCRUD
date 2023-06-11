<?php
include "config.php";
$id = $_GET["id"];
$result = mysqli_query($mysqli, "SELECT * FROM user WHERE id='$id'");
$data = mysqli_fetch_object($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="card">
            <a href="index.php" style="text-decoration: none; text-align: start;">Back</a>
            <div class="detail">
                <h2 style="text-align: center;">Detail</h2>
                <div class="body">
                    <img src="./uploads/<?= $data->image ?>" alt="" style="width: 100px; ">
                    <div class="detail-text">
                        <p>ID : <?= $data->id ?></p>
                        <p>Nama : <?= $data->name ?></p>
                        <p>Username : <?= $data->username ?></p>
                        <p>Password : <?= $data->password ?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>


</body>

</html>