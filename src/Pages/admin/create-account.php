<?php
$servername = "localhost"; // Ganti dengan nama server database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "santi_db"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $username = $_POST['username'];

  $sql = "INSERT INTO admin_table (username, password, email) VALUES ('$username', '$password','$email')";

  if ($conn->query($sql) === TRUE) {
    // echo "Data berhasil disimpan ke database.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Account</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gray-50 flex items-center justify-center min-h-screen">
  <div class="flex bg-white rounded-lg shadow-lg overflow-hidden max-w-4xl w-full">
    <!-- Gambar di samping form -->
    <div class="w-1/2 hidden md:block">
      <img src="https://images.unsplash.com/photo-1593642532871-8b12e02d091c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Sample Image" class="object-cover h-full w-full">
    </div>

    <!-- Form Pendaftaran -->
    <div class="w-full md:w-1/2 p-6">
      <div class="backdrop-blur-sm bg-white/30 rounded-lg">
        <form class="space-y-6" method="POST" action="create-account.php">
          <h1 class="font-bold text-2xl">Create Account</h1>
          <div>
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
            <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Username" required>
          </div>
          <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
            <input type="email" name="email" id="email" placeholder="Email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
          </div>
          <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
          </div>
          <div>
            <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900">Konfirmasi Password</label>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
          </div>
          <div class="flex flex-col justify-start"></div>
          <button type="submit" onclick="alert('Akun Berhasil Didaftarkan')" class="w-full bg-blue-600 text-white bg-slate-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Register</button>
          <p class="text-sm font-light text-gray-500">Have an account yet? <a href="login.php" class="font-medium text-primary-600 hover:underline">Login</a></p>
        </form>
      </div>
    </div>
  </div>
</body>

</html>