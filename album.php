<?php
include('auth.php');
$koneksi = require('koneksi.php');
$userId =  $_SESSION["id_user"];

if (isset($_POST["add_album"])) {
   addAlbumFoto($_POST);
}

// Check if search query is set
if (isset($_POST["search_album"])) {
   $searchQuery = $_POST["search_album"];
   $albumRaw = "SELECT * FROM album WHERE UserID = $userId AND NamaAlbum LIKE '%$searchQuery%'";
} else {
   $albumRaw = "SELECT * FROM album WHERE UserID = $userId";
}

$albumData = $koneksi->query($albumRaw);
$album = $albumData->fetchAll(PDO::FETCH_ASSOC);

function addAlbumFoto($data)
{
   global $koneksi;
   $currentDate = date('Y-m-d H:i:s');
   $userId =  $_SESSION["id_user"];

   $query = "INSERT INTO album VALUES (null, :NamaAlbum, :Deskripsi, :TanggalDibuat, :UserID)";
   $stmt = $koneksi->prepare($query);
   $stmt->execute([
      ':NamaAlbum' => $data['name_album'],
      ':Deskripsi' => $data['deskripsi'],
      ':TanggalDibuat' => $currentDate,
      ':UserID' => $userId,
   ]);

   if (!$stmt) {
      echo "<script>
                alert('Belum Berhasil Menambahkan Album!');
            </script>";
   } else {
      echo "<script>
                window.location.href = 'album.php';
            </script>";
   }
}

// Update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
   $AlbumID = $_POST['albumID'];
   $NamaAlbum = $_POST['name_album'];
   $Deskripsi = $_POST['deskripsi'];
   //  $DeskripsiFoto = $_POST['DeskripsiFoto'];
   //  $TanggalUnggah = $_POST['TanggalUnggah'];
   //  $AlbumID = $_POST['AlbumID'];
   //  $UserID = $_POST['UserID'];

   $stmt = $pdo->prepare("UPDATE album SET NamaAlbum=?, Deskripsi=? WHERE AlbumID=?");
   $stmt->execute([$NamaAlbum, $Deskripsi, $AlbumID]);

   if (!$stmt) {
      echo "<script>
              alert('Belum Berhasil Menambahkan foto!');
           </script>";
   } else {
      echo "<script>
              window.location.href = 'album.php';
           </script>";
   }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
   $AlbumID = $_POST['AlbumID'];

   // Delete record from database
   $stmt = $pdo->prepare("DELETE FROM album WHERE AlbumID=?");
   $stmt->execute([$AlbumID]);

   if (!$stmt) {
      echo "<script>
               alert('Belum Berhasil Menghapus Album foto!" . $AlbumID . " ');
            </script>";
   } else {
      echo "<script>
               window.location.href = 'album.php';
            </script>";
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Album</title>
</head>

<body>
   <div class="card shadow-sm rounded-3 m-3 min-vh-100">
      <!-- <div class="grid grid-cols-2">
         <div class="relative">
            <div class="absolute bottom-7 start-0 flex items-center ps-3 pointer-events-none">
               <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
               </svg>
            </div>

            <form method="post" action="">
               <input type="search" name="search_album" id="default-search" class="block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search album title...">
               <button type="submit" class="text-white absolute end-1.5 bottom-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </form>
         </div>

         <div class="flex justify-end items-center">
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" type="button" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
               <i class="fa-solid fa-plus"></i>
            </button>
         </div>
      </div> -->

      <div class="p-3 row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
         <?php if (empty($album)) : ?>
            <div class="w-100 vh-100 fs-2 d-flex justify-content-center align-items-center flex-column text-secondary gap-3">
               <i class="fa-solid fa-folder" style="font-size: 150px;"></i>
               <p class="text-[#666]">There is no album</p>
            </div>
         <?php else : ?>
            <?php foreach ($album as $data) : ?>
               <div class="col">
                  <div class="d-flex shadow-sm border rounded-3 p-0 m-1" style="height: 100px;">
                     <div class="d-flex justify-content-center align-items-center h-full w-25 m-2 rounded-3" style="background-color: #f1f4f8;">
                        <i class="fa-solid fa-folder fs-1"></i>
                     </div>

                     <div class="h-full d-flex mt-2 w-50">
                        <a href="detail_album.php?id=<?= $data["AlbumID"] ?>" class="h-full w-100 text-decoration-none">
                           <div class="d-flex flex-column">
                              <span class="fw-bold text-black"><?= $data["NamaAlbum"] ?></span>
                              <span class="text-secondary"><?= $data["Deskripsi"] ?></span>
                           </div>
                        </a>
                     </div>

                     <div class="dropdown w-25">
                        <button class="btn float-end mt-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                           <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>

                        <form method="post">
                           <ul class="dropdown-menu dropdown-menu-end mt-2">
                              <input type="hidden" name="AlbumID" value="<?= $data['AlbumID'] ?>">
                              <li>
                                 <button type="button" data-bs-toggle="modal" data-bs-target="#updateAlbum" class="dropdown-item d-flex align-items-center gap-2" onclick="editTitle(<?= htmlspecialchars(json_encode($data)) ?>)">
                                    <i class="fa-solid fa-pen text-warning"></i> Edit
                                 </button>
                              </li>
                              <li><button name="delete" class="dropdown-item d-flex align-items-center gap-2"><i class="fa-solid fa-trash text-danger"></i> Delete</button></li>
                           </ul>
                        </form>
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
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Create Album</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form class="" method="post" enctype="multipart/form-data">
                     <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Album Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="name_album" placeholder="type here...">
                     </div>
                     <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Album Desscription</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi" placeholder="type here..."></textarea>
                     </div>

                     <button type="submit" name="add_album" class="btn background-primary w-100 fw-bold text-white">create</button>
                  </form>
               </div>
            </div>
         </div>
      </div>

      <div class="modal fade" id="updateAlbum" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header border-0">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Album</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form class="" method="post" enctype="multipart/form-data">
                     <input type="hidden" id="albumID" name="albumID">
                     <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Album Title</label>
                        <input type="text" class="form-control" id="albumName" name="name_album" placeholder="type here...">
                     </div>
                     <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Album Desscription</label>
                        <textarea class="form-control" id="descriptionAlbum" rows="3" name="deskripsi" placeholder="type here..."></textarea>
                     </div>

                     <button type="submit" name="update" class="btn background-primary w-100 fw-bold text-white">Update</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>

   <script>
      function editTitle(data) {
         document.getElementById('albumID').value = data.AlbumID;
         document.getElementById('albumName').value = data.NamaAlbum;
         document.getElementById('descriptionAlbum').value = data.Deskripsi;
      }
   </script>
</body>

</html>

<!-- editTitle('<?= $data['AlbumID'] ?>', '<?= $data['NamaAlbum'] ?>', '<?= $data['Deskripsi'] ?>') -->