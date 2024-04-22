<?php
$currentPage = basename($_SERVER['PHP_SELF']);

if (isset($_POST['logout'])) {
    session_start();

    session_destroy();

    header('location: login_halaman.php');

    exit();
}
?>

<head>
    <link rel="shortcut icon" href="./Assets/GlimpseLogo.png" type="image/x-icon">
    <link rel="stylesheet" href="./Styles/style.css">
    <link rel="stylesheet" href="./Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="sticky-top background-primary" style="height: 65px;">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center h-max">
                <img src="./Assets/GlimpseLogoWhite.png" alt="Bootstrap" width="35px" height="35px">
                <p class="mt-3 fw-bold fs-5" style="color: #f4f4f4;">limpse Gallery</p>
                <div class="ms-5 mt-1 d-flex gap-3 align-items-cente">
                    <a href="./index.php" class="text-decoration-none fs-5 fw-bold text-white">Home</a>
                    <a href="./album.php" class="text-decoration-none fs-5 fw-bold text-white">Album</a>
                    <!-- <span><?= $currentPage ?></span> -->
                </div>
            </div>

            <div class="d-flex gap-3 align-items-center">

                <button class="btn btn-secondary rounded-circle p-2" style="width: 40px;height:40px" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user"></i>
                </button>

                <div class="dropdown">
                    <form method="post" action="">
                        <ul class="dropdown-menu h-max">
                            <li><button class="dropdown-item" type="button"><?= $_SESSION['login_user'] ?></button></li>
                            <li>
                                <button name="logout" class="dropdown-item d-flex align-items-center gap-2"><i class="fa-solid fa-person-through-window"></i> Sign Out</button>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <script src="./Bootstrap/js/bootstrap.min.js"></script>
    <script src="./Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>