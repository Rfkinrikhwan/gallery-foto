<?php
include('auth.php');
$koneksi = require('koneksi.php');
$userId =  $_SESSION["id_user"];
$fotoID = $_GET["id"];

$stmt = $pdo->query("SELECT * FROM foto WHERE FotoID = $fotoID");
$photos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./Assets/GlimpseLogo.png" type="image/x-icon">
    <link rel="stylesheet" href="./Styles/style.css">
    <link rel="stylesheet" href="./Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?= $photos[0]['JudulFoto'] ?></title>
</head>

<body>
    <div class="card mb-3 m-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?= $photos[0]['LokasiFile'] ?>" alt="<?= $photos[0]['JudulFoto'] ?>" class="img-fluid rounded-start rounded-3" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h1 class="card-title"><?= $photos[0]['JudulFoto'] ?></h1>
                    <p class="card-text"><?= $photos[0]['DeskripsiFoto'] ?></p>
                    <p class="card-text"><small class="text-body-secondary"><?= $photos[0]['TanggalUnggah'] ?></small></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>