<?php
include '../../Config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];


    $sql = "INSERT INTO user_table (username, password, email) VALUES ('$username', '$password','$email')";

    if ($conn->query($sql) === TRUE) {
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
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body style="background-image: url(../asset/img/Home\ Bg.png);" class="flex bg-cover flex-col items-center justify-center min-h-screen bg-url  ">
    <div class="container"></div>
    <div class="w-full max-w-md">
        <h1 class="text-4xl font-bold text-center text-orange-500 mb-6">Daftar</h1>
        <div class="backdrop-blur-sm bg-white/30 rounded-lg shadow-md p-6">
            <form class="space-y-6" method="POST" action="register.php">
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
                <button type="submit" onclick="alert('Akun Berhasil Didaftarkan')" class="w-full text-white bg-slate-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Register</button>
                <p class="text-sm font-light text-gray-500">Have an account yet? <a href="login.php" class="font-medium text-primary-600 hover:underline">Login</a></p>
            </form>
        </div>
    </div>
</body>

</html>