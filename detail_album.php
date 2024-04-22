<?php
include('auth.php');
$koneksi = require('koneksi.php');
$userId =  $_SESSION["id_user"];
$albumId = $_GET["id"];

$stmt = $pdo->query("SELECT * FROM foto WHERE AlbumID = $albumId");
$photos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Create
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
   $JudulFoto = $_POST['JudulFoto'];
   $DeskripsiFoto = $_POST['DeskripsiFoto'];
   $TanggalUnggah = date('Y-m-d');
   $AlbumID = $albumId;

   // Handle file upload
   $LokasiFile = 'uploads/' . $_FILES['LokasiFile']['name'];
   move_uploaded_file($_FILES['LokasiFile']['tmp_name'], $LokasiFile);

   $stmt = $pdo->prepare("INSERT INTO foto (JudulFoto, DeskripsiFoto, TanggalUnggah, LokasiFile, AlbumID, UserID) VALUES (?, ?, ?, ?, ?, ?)");
   $stmt->execute([$JudulFoto, $DeskripsiFoto, $TanggalUnggah, $LokasiFile, $AlbumID,  $userId]);

   if (!$stmt) {
      echo "<script>
                    alert('Belum Berhasil Menambahkan foto!');
                </script>";
   } else {
      echo "<script>
                    window.location.href = 'detail_album.php?id=$albumId';
                </script>";
   }
}

// Update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
   $FotoID = $_POST['fotoid'];
   $JudulFoto = $_POST['fototitle'];
   $DeskripsiFoto = $_POST['DeskripsiFoto'];
   //  $TanggalUnggah = $_POST['TanggalUnggah'];
   //  $AlbumID = $_POST['AlbumID'];
   //  $UserID = $_POST['UserID'];

   $stmt = $pdo->prepare("UPDATE foto SET JudulFoto=? WHERE FotoID=?");
   $stmt->execute([$JudulFoto, $FotoID]);

   if (!$stmt) {
      echo "<script>
               alert('Belum Berhasil Menambahkan foto!');
            </script>";
   } else {
      echo "<script>
               window.location.href = 'detail_album.php?id=$albumId';
            </script>";
   }
}

// Delete
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
   $FotoID = $_POST['FotoID'];

   // Get image path before deleting
   $stmt = $pdo->prepare("SELECT LokasiFile FROM foto WHERE FotoID=?");
   $stmt->execute([$FotoID]);
   $row = $stmt->fetch(PDO::FETCH_ASSOC);

   // Delete record from database
   $stmt = $pdo->prepare("DELETE FROM foto WHERE FotoID=?");
   $stmt->execute([$FotoID]);

   // Delete image file
   if ($row) {
      unlink($row['LokasiFile']);
   }

   if (!$stmt) {
      echo "<script>
                 alert('Belum Berhasil Menambahkan foto!');
             </script>";
   } else {
      echo "<script>
               window.location.href = 'detail_album.php?id=$albumId';
             </script>";
   }
}
?>

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="shortcut icon" href="./Assets/GlimpseLogo.png" type="image/x-icon">
   <link rel="stylesheet" href="./Styles/style.css">
   <link rel="stylesheet" href="./Bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <title>Album <?= $albumId ?></title>
</head>

<body>
   <div class="card shadow-sm rounded-3 m-3 min-vh-100">
      <!-- <pre><?= json_encode($photos, JSON_PRETTY_PRINT) ?></pre> -->
      <div class="p-3 row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
         <?php if (empty($photos)) : ?>
            <div class="w-100 vh-100 fs-2 d-flex justify-content-center align-items-center flex-column text-secondary gap-3">
               <i class="fa-solid fa-image" style="font-size: 150px;"></i>
               <p class="text-[#666]">There is no photos</p>
            </div>
         <?php else : ?>
            <?php foreach ($photos as $data) : ?>
               <div class="col">
                  <div class="card w-100" style="background-color: #f1f4f8;">
                     <div class="d-flex align-items-end justify-content-between relative px-3" style="height: 40px;">
                        <div class="d-flex align-items-center gap-2">
                           <i class="fa-regular fa-image"></i>
                           <span class=""><?= $data['JudulFoto'] ?></span>
                        </div>


                        <div class="dropdown">
                           <button class="btn float-end" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="fa-solid fa-ellipsis-vertical"></i>
                           </button>
                           <form method="post">
                              <ul class="dropdown-menu dropdown-menu-end mt-2">
                                 <input type="hidden" name="FotoID" value="<?= $data['FotoID'] ?>">
                                 <li><button data-bs-toggle="modal" data-bs-target="#editFoto" onclick="editTitle(<?= htmlspecialchars(json_encode($data)) ?>)" type="button" class="dropdown-item d-flex align-items-center gap-2"><i class="fa-solid fa-pen text-warning"></i> Edit</button></li>
                                 <li><button name="delete" class="dropdown-item d-flex align-items-center gap-2"><i class="fa-solid fa-trash text-danger"></i> Delete</button></li>
                              </ul>
                           </form>
                        </div>
                     </div>

                     <div class="m-3 bg-white rounded-2">
                        <a href="./detail_foto.php?id=<?= $data['FotoID'] ?>">
                           <img src="<?= $data['LokasiFile'] ?>" alt="<?= $data['JudulFoto'] ?>" class="card-img-top object-fit-cover rounded-2" style="height: 20rem;" alt="...">
                        </a>
                     </div>
                  </div>

               </div>
            <?php endforeach; ?>
         <?php endif; ?>
      </div>

      <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn background-primary text-white fs-1 rounded-circle d-flex justify-content-center align-items-center" style="right: 2vw; bottom: 4vh; z-index: 999; position: fixed;width: 60px;height: 60px">+</button>

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header border-0">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Image</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form class="" method="post" enctype="multipart/form-data">
                     <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Image Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="JudulFoto" placeholder="type here...">
                     </div>
                     <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Image File</label>
                        <input class="form-control" id="LokasiFile" name="LokasiFile" type="file" placeholder="choose file...">
                     </div>
                     <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Image Desscription</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="DeskripsiFoto" placeholder="type here..."></textarea>
                     </div>

                     <button type="submit" name="submit" class="btn background-primary w-100 fw-bold text-white">Upload</button>
                  </form>
               </div>
            </div>
         </div>
      </div>

      <div class="modal fade" id="editFoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header border-0">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Image</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form class="" method="post" enctype="multipart/form-data">
                     <input type="hidden" name="fotoid" id="fotoid">
                     <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Image Title</label>
                        <input type="text" class="form-control" id="fototitle" name="fototitle" placeholder="type here...">
                     </div>
                     <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Image Desscription</label>
                        <textarea class="form-control" id="DeskripsiFoto" rows="3" name="DeskripsiFoto" placeholder="type here..."></textarea>
                     </div>

                     <button name="update" class="btn background-primary w-100 fw-bold text-white">Update</button>
                  </form>
               </div>
            </div>
         </div>
      </div>

   </div>

   <script src="./Bootstrap/js/bootstrap.min.js"></script>
   <script src="./Bootstrap/js/bootstrap.bundle.min.js"></script>
   <script>
      function editTitle(data) {
         document.getElementById('fotoid').value = data.FotoID;
         document.getElementById('fototitle').value = data.JudulFoto;
         document.getElementById('DeskripsiFoto').value = data.DeskripsiFoto;
      }

      function closeEditTitleModal() {
         document.getElementById('edit-title-modal').classList.add('hidden');
      }
   </script>
</body>

</html>