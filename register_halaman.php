<?php
$koneksi = require('./koneksi.php');

if (isset($_POST["register_account"])) {
      proses_tambah_petugas($_POST);
}

function proses_tambah_petugas($data)
{
      global $koneksi;

      $query = "INSERT INTO user VALUES (null, :Username, :Password, :Email, :NamaLengkap, :Alamat)";
      $stmt = $koneksi->prepare($query);
      $stmt->execute([
            ':Username' => $data['username'],
            ':Password' => md5($data['password']),
            ':Email' => $data['email'],
            ':NamaLengkap' => $data['full_name'],
            ':Alamat' => $data['address'],
      ]);

      if (!$stmt) {
            echo "<script>
					alert('Belum Berhasil Membuat Account!');
				</script>";
      } else {
            echo "<script>
					alert('Berhasil Membuat Account!');
					document.location.href = 'login_halaman.php';
				</script>";
      }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="./Bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="./Styles/style.css">
      <link rel="shortcut icon" href="./Assets//GlimpseLogo.png" type="image/x-icon">
      <title>Sign Up</title>
</head>

<body>
      <div class="w-full vh-100 d-flex justify-content-center align-items-center" style="background-color: #f4f4f4;">
            <div class="card shadow-sm rounded-3 m-3" style="border: 0.5px solid #dcdfe6">
                  <div class="d-flex align-items-center justify-content-center p-3 flex-column">
                        <img src="./Assets/GlimpseLogo.png" class="w-25" alt="">
                        <p class="h3 mt-2 color-primary fw-bold">
                              Glimpse Gallery
                        </p>
                  </div>

                  <div class="card-body px-4">
                        <form class="d-flex justify-content-center col gap-4 flex-column" method="post">
                              <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-column gap-2">
                                          <div class="form-group">
                                                <label for="full_name" class="text-secondary">Name</label>
                                                <input type="text" name="full_name" id="full_name" class="form-control mt-1" placeholder="example: alex" required>
                                          </div>
                                          <div class="form-group">
                                                <label for="email" class="text-secondary">Email</label>
                                                <input type="email" name="email" id="email" placeholder="example@gmail.com" class="form-control mt-1" required>
                                          </div>
                                          <div class="form-group">
                                                <label for="password" class="text-secondary">Password</label>
                                                <input type="password" name="password" id="password" placeholder="••••••••" class="form-control" required>
                                          </div>
                                    </div>

                                    <div class="d-flex flex-column gap-2">
                                          <div class="form-group">
                                                <label for="address" class="text-secondary">Address</label>
                                                <input type="text" name="address" id="address" placeholder="Jl. Samanhudi" class="form-control mt-1" required>
                                          </div>
                                          <div class="form-group">
                                                <label for="username" class="text-secondary">Username</label>
                                                <input type="text" name="username" id="username" placeholder="kikiw" class="form-control mt-1" required>
                                          </div>
                                    </div>
                              </div>

                              <button name="register_account" type="submit" class="btn background-primary fw-bold text-white w-100 p-2 border-0 rounded-2">Sign Up</button>
                              <div class="text-secondary text-center">
                                    Have Account? <a href="login_halaman.php" class="link dark">Sign In</a>
                              </div>
                        </form>
                  </div>
            </div>
      </div>
</body>

</html>