<?php

$koneksi = require("koneksi.php");
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$myusername = $_POST['username'];
	$mypassword = $_POST['password'];

	$sql = "SELECT UserID, Email FROM user WHERE Username = ? and Password = ?";
	$stmt = $koneksi->prepare($sql);
	$stmt->execute([$myusername, md5($mypassword)]);
	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	if ($result) {
		$id = $result['UserID'];
		$email = $result['Email'];

		$_SESSION['login_user'] = $myusername;
		$_SESSION['user_email'] = $email;
		$_SESSION['id_user'] = $id;

		echo '<script>
			window.location.href="index.php";
			</script>';
	} else {
		$error = "Username / Password kamu salah, Tolong coba lagi ya";
		echo '<script>
				alert("' . $error . '");
				window.location.href="login_halaman.php";
				</script>';
		die();
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
	<link rel="shortcut icon" href="./Assets/GlimpseLogo.png" type="image/x-icon">
	<title>Sign In</title>
</head>

<body>
	<div class="w-full vh-100 d-flex justify-content-center align-items-center" style="background-color: #f4f4f4;">
		<div class="card w-25 shadow-sm rounded-3 m-3" style="border: 0.5px solid #dcdfe6">
			<div class="d-flex align-items-center justify-content-center p-3 flex-column">
				<img src="./Assets/GlimpseLogo.png" class="w-25" alt="">
				<p class="h3 mt-2 color-primary fw-bold">
					Glimpse Gallery
				</p>
			</div>

			<div class="card-body px-4">
				<form method="post" class="d-flex justify-content-center col gap-4 flex-column">
					<div class="form-group">
						<label for="email" class="text-secondary">Username</label>
						<input type="text" name="username" id="email" class="form-control mt-1 p-2" placeholder="example: kikidayo" required>
					</div>
					<div class="form-group">
						<label for="password" class="text-secondary">Password</label>
						<input type="password" name="password" id="password" placeholder="••••••••" class="form-control mt-1 p-2" required>
					</div>
					<button type="submit" class="btn background-primary text-white fw-bold w-100 p-2 border-0 rounded-2">Sign In</button>
					<div class="text-secondary text-center">
						Not registered? <a href="register_halaman.php" class="link dark">Create account</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>